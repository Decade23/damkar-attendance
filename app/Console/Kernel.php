<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Orders;
use App\Models\WhatsappFollowupUnpaid;
use App\Models\WhatsappNumber;
use App\Models\WhatsappMessage;
use App\Traits\Whatsapp\WhatsappTrait;
use App\Traits\UpdatePrice\UpdatePriceTrait;
use Illuminate\Support\Facades\Log;
use App\Models\StocksDiary;
use App\Models\Product;
use App\Models\Portfolio;
use App\Traits\Users\SalesTrait;
use App\Traits\Users\SalesRollingOpportunity;
use App\Models\Auth\UserProduct;
use App\Models\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class Kernel extends ConsoleKernel
{
    use WhatsappTrait, UpdatePriceTrait, SalesTrait, SalesRollingOpportunity;
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $date_now = date('Y-m-d H:i:s');
            $orders = Orders::where('payment_status','unpaid')->first();
            if($orders == null || $orders == false){

            }
            else{
                $number = WhatsappNumber::first();
                $orders = Orders::where('payment_status','unpaid')->get();
                foreach ($orders as $order) {
                    $whatsapp = WhatsappMessage::where('model','Member')->where('user_id',$order->customer_id)->orderBy('id','desc')->first();
                    if($whatsapp == null){
                        $date1 = date_create(date('Y-m-d H:i:s',strtotime($order->updated_at)));
                        $date2 = date_create($date_now);
                        $diff  = date_diff($date1, $date2);

                        if($diff->h >= 8){
                            $next_step = $order->step + 1;
                            $followup_unpaids = WhatsappFollowupUnpaid::where('step',$next_step)->where('status','active')->first();
                            if($followup_unpaids == null || $followup_unpaids == false){
                                $order->payment_status = 'cancel';
                                $order->due_date       = null;
                                $order->paid_at        = null;
                                $order->save();
                            }
                            else{
                                $followup_unpaids = WhatsappFollowupUnpaid::where('step',$next_step)->where('status','active')->get();
                                foreach ($followup_unpaids as $followup_unpaid) {
                                //     $this->sendMessageWAFollowupUnpaid($number->id, $followup_unpaid->message, $order->customer_id);
                                }
                                // $order->step = $order->step + 1;
                                // $order->save();
                            }
                        }
                    }
                    else{
                        $date1 = date_create(date('Y-m-d H:i:s',strtotime($whatsapp->created_at)));
                        $date2 = date_create($date_now);
                        $diff  = date_diff($date1, $date2);

                        if($diff->days == 0 && $diff->h >= 8){
                            $next_step = $order->step + 1;
                            $followup_unpaids = WhatsappFollowupUnpaid::where('step',$next_step)->where('status','active')->first();
                            if($followup_unpaids == null || $followup_unpaids == false){
                                $order->payment_status = 'cancel';
                                $order->due_date       = null;
                                $order->paid_at        = null;
                                $order->save();
                            }
                            else{
                                $followup_unpaids = WhatsappFollowupUnpaid::where('step',$next_step)->where('status','active')->get();
                                foreach ($followup_unpaids as $followup_unpaid) {
                                    $this->sendMessageWAFollowupUnpaid($number->id, $followup_unpaid->message, $order->customer_id);
                                }
                                $order->step = $order->step + 1;
                                $order->save();
                            }
                        }
                    }
                }
            }
        })->everyFiveMinutes();

        $schedule->call(function () {
            $product = Product::where('slug','super-trader-signal-id')->first();
            $stocks  = StocksDiary::where('product_id',$product->id)->whereNotIn('action_summary',['SELL'])->get();
            if($stocks->isEmpty() == false){
                foreach ($stocks as $stock) {
                    $response = $this->update_price($stock->stocks);
                    if($response == 'error'){

                    }
                    else{
                        $response = json_decode($response);
                        $replies = $response->replies;
                        if($replies == []){

                        }
                        else{
                            foreach ($replies as $reply) {
                                if(substr($reply->Date, 0, 10) == date('Y-m-d')){
                                    $profit_from_best_price = ($reply->Close - $stock->buy_down) / $stock->buy_down * 100;
                                    $profit_from_max_buy    = ($reply->Close - $stock->buy_up) / $stock->buy_up * 100;

                                    $stock->price_now              = $reply->Close;
                                    $stock->profit_from_best_price = number_format($profit_from_best_price, 2, '.', '');
                                    $stock->profit_from_max_buy    = number_format($profit_from_max_buy, 2, '.', '');
                                    $stock->save();

                                    $portfolios = Portfolio::where('stocks',$stock->stocks)->get();
                                    if($portfolios->isEmpty() == false){
                                        foreach ($portfolios as $portfolio) {
                                            $gain_loss = ($reply->Close - $portfolio->buy_price) / $portfolio->buy_price;

                                            $portfolio->price_now = $reply->Close;
                                            $portfolio->gain_loss = number_format($gain_loss, 2, '.', '');
                                            $portfolio->save();
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        })->dailyAt('17:00');

        $schedule->call(function () { # opportunity

            $select = [
                'user_id',
                'expired_at',
                'follow_up_by'
            ];

            $nameSales = '';

            $dataDb = UserProduct::select($select)->with('user')->whereHas('product', function(Builder  $query) {
                $query->where('type', 'membership');
            })->whereNotNull('expired_at')->whereBetween('expired_at', [now()->format('Y-m-d'), now()->addMonth()->format('Y-m-d')])->get();

            foreach ($dataDb as $val) {
                # rolling sales...
                $nameSales = User::find($this->rollingOpportunitySales()['id']);
                #add queue
                $followUpBy = UserProduct::where('user_id',$val->user_id);
                // dd($followUpBy);
                $update = [
                    'follow_up_by' => $nameSales->name
                ];
                $followUpBy->update($update);
            }

        })->dailyAt('00:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
