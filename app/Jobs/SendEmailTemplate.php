<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Auth\User;

class SendEmailTemplate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $users_id;
    protected $subject;
    protected $content;
    protected $sender_name;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($users_id, $subject, $content, $sender_name)
    {
        $this->users_id     = $users_id;
        $this->subject      = $subject;
        $this->content      = $content;
        $this->sender_name  = $sender_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $users_id    = $this->users_id;
            $subject     = $this->subject;
            $content     = $this->content;
            $sender_name = $this->sender_name;

            if($users_id != null){
                foreach ($users_id as $user_id) {
                    $user = User::where('id',$user_id)->first();
                    if($user == null || $user == false){

                    }
                    else{
                        $recipient_email[] = [
                            'recipient'  => $user->email,
                            'attributes' => array(
                                'NAME'  => $user->name,
                                'EMAIL' => $user->email,
                                'PHONE' => $user->phone
                            )
                        ];
                    }
                }

                $field = [
                    'subject' => $subject,
                    'content' => $content,
                    'from'    => array(
                        'fromEmail' => 'noreply@ellen-may.com',
                        'fromName'  => $sender_name
                    ),
                    'personalizations' => $recipient_email
                ];

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL             => 'https://api.pepipost.com/v2/sendEmail',
                    CURLOPT_RETURNTRANSFER  => true,
                    CURLOPT_ENCODING        => '',
                    CURLOPT_MAXREDIRS       => 10,
                    CURLOPT_TIMEOUT         => 30,
                    CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST   => 'POST',
                    CURLOPT_POSTFIELDS      => json_encode($field),
                    CURLOPT_HTTPHEADER      => array(
                        'api_key: '.config("pepipost.api_key_pepipost")
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);
                if($err){
                    Log::info($e);
                }
            }
        }
        catch (Exception $e) {
            Log::info($e);
        }
    }
}
