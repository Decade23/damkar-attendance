<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     UserProductTrait.php
 * @LastModified 2/13/19 2:39 PM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits\Users;

use App\Models\Auth\UserProduct;
use App\Models\Product;
use Carbon\Carbon;

trait UserProductTrait
{
    /**
     * For Save User Product
     *
     * @param $orderDetailDb
     *
     * @return bool
     */
    public function storeUserProduct($orderDetailDb, $trialDays = 0)
    {

        if($orderDetailDb->product_id !== null){
            #This Product Is Already In Our Record?
            $productSTSID     = Product::where('slug','super-trader-signal-id')->first();
            $productSTSID3bln = Product::where('slug','super-trader-signal-id-3-bulan')->first();
            $productSTSID1bln = Product::where('slug','super-trader-signal-id-1-bulan')->first();

            if ($productSTSID == null && $productSTSID3bln == null && $productSTSID1bln == null) {
                # code...
                return '';
            }

            if($orderDetailDb->product_id == $productSTSID3bln->id || $orderDetailDb->product_id == $productSTSID1bln->id){
                $orderDetailDb->product_id = $productSTSID->id;
            }
            $userProductDb = UserProduct::firstOrCreate(['product_id' => $orderDetailDb->product_id, 'user_id' => $orderDetailDb->order->customer_id]);
            
            if (request()->is('auth/trial*')) { // jika trial member
                $userProductDb->membership_status = 'trial';

                if ($orderDetailDb->product_type == 'Membership' || $orderDetailDb->product_type == 'membership') {
                    $timePeriod = $orderDetailDb->product_time_period * $orderDetailDb->qty;
                    if ($userProductDb->start_at == null) {
                        $userProductDb->start_at = now()->format('Y-m-d');
                    }
                    // dd($trialDays);
                    $userProductDb->expired_at = now()->addDays($trialDays)->format('Y-m-d');
                }
                else if ($orderDetailDb->product_type == 'Online Class' || $orderDetailDb->product_type == 'online class' || $orderDetailDb->product_type == 'Online class') {
                    $timePeriod = $orderDetailDb->product_time_period * $orderDetailDb->qty;
                    if ($userProductDb->start_at == null) {
                        $userProductDb->start_at = now()->format('Y-m-d');
                    }
                    // dd($trialDays);
                    $userProductDb->expired_at = now()->addDays($trialDays)->format('Y-m-d');
                }
                else if($orderDetailDb->product_type == 'workshop' || $orderDetailDb->product_type == 'Workshop'){
                    $userProductDb->start_at   = $orderDetailDb->product->start_at;
                    $userProductDb->expired_at = now()->addDays($trialDays)->format('Y-m-d');
                }

            }else { // jika bukan trial member
                $userProductDb->membership_status = null;

                if ($orderDetailDb->product_type == 'Membership' || $orderDetailDb->product_type == 'membership') {
                    $timePeriod = $orderDetailDb->product_time_period * $orderDetailDb->qty;
                    if ($userProductDb->start_at == null) {
                        $userProductDb->start_at = now()->format('Y-m-d');
                    }
                    // dd($trialDays);
                    $userProductDb->expired_at = $this->expiredAt($userProductDb->expired_at, $timePeriod, $trialDays);
                }
                else if ($orderDetailDb->product_type == 'Online Class' || $orderDetailDb->product_type == 'online class' || $orderDetailDb->product_type == 'Online class') {
                    $timePeriod = $orderDetailDb->product_time_period * $orderDetailDb->qty;
                    if ($userProductDb->start_at == null) {
                        $userProductDb->start_at = now()->format('Y-m-d');
                    }
                    // dd($trialDays);
                    $userProductDb->expired_at = $this->expiredAt($userProductDb->expired_at, $timePeriod, $trialDays);
                }
                else if($orderDetailDb->product_type == 'workshop' || $orderDetailDb->product_type == 'Workshop'){
                    $userProductDb->start_at   = $orderDetailDb->product->start_at;
                    $userProductDb->expired_at = $orderDetailDb->product->end_at;
                }
                
            }
            $userProductDb->save();
            return $userProductDb;
        }
        else{
            return false;
        }
    }

    /**
     * This User Is Expired or Not?
     *
     * @param $expiredAt
     * @param $timePeriod
     *
     * @return string
     */
    public function expiredAt($expiredAt, $timePeriod, $trialDays = 0) #penambahan trialDays jika produk memiliki masa trial/percobaan
    {
        if ($expiredAt == null) {

            #Empty Memberships..
            $expiredAt = now()->addMonth($timePeriod)->addDays($trialDays)->format('Y-m-d');
        } else {

            $differentDays = now()->diffInDays($expiredAt, false);

            if ($differentDays <= 0) {

                # Expired Memberships
                $expiredAt = now()->addMonth($timePeriod)->addDays($trialDays)->format('Y-m-d');
            } else {

                # Extend The Memberships Time
                $expiredAt = Carbon::parse($expiredAt)->addMonth($timePeriod)->addDays($trialDays)->format('Y-m-d');
            }
        }
        // dd($expiredAt);
        return $expiredAt;
    }
}