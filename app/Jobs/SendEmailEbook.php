<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use Illuminate\Support\Facades\Log;

class SendEmailEbook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $type;
    protected $attachment;
    protected $users;
    protected $filename;
    protected $ebook;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type, $attachment, $users, $filename,$ebook)
    {
        $this->type 		= $type;
        $this->attachment 	= $attachment;
        $this->users 		= $users;
        $this->filename 		= $filename;
        $this->ebook 		= $ebook;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $user = $this->users;
            $attachment = $this->attachment;
            $type = $this->type;
            $filename = $this->filename;
            $ebook = $this->ebook;

            if($user != null){
                // foreach ($users as $user) {
                if($user->name == null || $user->name == "") {
                    $userFullName = "Bapak / Ibu";
                }
                else{
                    $userFullName = $user->name;
                }
                $recipient_email[] = [
                    'recipient'  => $user->email,
                    'attributes' => array(
                        'NAME'  => $userFullName,
                        'EMAIL' => $user->email,
                        'PHONE' => substr($user->phone, 0, 5)
                    )
                ];
                $lampiran[] = [
                    'fileContent' => $attachment,
                    'fileName' => $filename
                ];
                // }
                if($ebook=="EbookStrategiMoneyManagementSahamPraktis"){

                    $content = '<!DOCTYPE html>
            <html>
              <head>
                <title></title>
                <style>
                a.button {
                  background-color: #4CAF50;
                  border: none;
                  color: #FFFFFF;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  margin: 4px 2px;
                  cursor: pointer;
                }
                a.button:visited {
                  color: #FFFFFF;
                }
                </style>
              </head>

              <body>
                <div>
                  <p>Halo '.$userFullName.',</p>

                  <p>Terima kasih sudah mendownload Ebook “Beli Saham Berapa Banyak”.</p>
                  
                  <p>Sebagai apresiasi kami atas semangat '.$userFullName.', kami memberikan VOUCHER bonus 1 bulan gratis, untuk pembelian Super Trader Signal (Premium Access) yang terbatas hanya untuk 24 jam sejak mendownload ebook ini.</p>

                  <p>Cara pakainya mudah banget! <a href="https://ellen-may.com/support-ebook?name='.$userFullName.'">Klik disini</a> ya untuk menggunakan voucher tersebut.</p>
                  <p>Semoga bermanfaat!</p>
                  <br>
                  <br>
                  <p>Salam profit,</p>
                  <p>Ellen May</p>
                  <center><a href="https://ellen-may.com/support-ebook?name='.$userFullName.'" class="button">JOIN SUPER TRADER SIGNAL (PREMIUM ACCESS) & KLAIM BONUS 1 BULAN</a>
                  <br> 
                  <a href="https://ellen-may.com/support-ebook?name='.$userFullName.'"><img width="720px" src="http://ellen-may.com/images/banner/banner-premium-access.jpeg"></a></center>
                  
              </body>
            </html>​';

                    $field = [
                        'attachments' => $lampiran,
                        'subject' => 'Download Ebook Anda Sekarang',
                        'content' => $content,
                        'from'    => array(
                            'fromEmail' => 'noreply@ellen-may.com',
                            'fromName'  => 'Ellen May Institute'
                        ),
                        'personalizations' => $recipient_email
                    ];

                }elseif($ebook=="EbookPensiunKaya"){

                    $content = '<!DOCTYPE html>
            <html>
              <head>
                <title></title>
                <style>
                a.button {
                  background-color: #4CAF50;
                  border: none;
                  color: #FFFFFF;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  margin: 4px 2px;
                  cursor: pointer;
                }
                a.button:visited {
                  color: #FFFFFF;
                }
                </style>
              </head>

              <body>
                <div>
                  <p>Halo '.$userFullName.',</p>

                  <p>Terima kasih sudah mendownload Ebook “Cara Pensiun Muda & Kaya Ala Ellen May”.</p>
                  
                  <p>Sebagai apresiasi kami atas semangat '.$userFullName.', kami memberikan VOUCHER bonus 1 bulan gratis, untuk pembelian Super Trader Signal (Premium Access) yang terbatas hanya untuk 24 jam sejak mendownload ebook ini.</p>

                  <p>Cara pakainya mudah banget! Klik di sini <a href="https://ellen-may.com/support-ebook?name='.$userFullName.'">Klik disini</a> ya untuk menggunakan voucher tersebut.</p>
                  <p>Semoga bermanfaat!</p>
                  <br>
                  <br>
                  <p>Salam profit,</p>
                  <p>Ellen May</p> 
                  <center><a href="https://ellen-may.com/support-ebook?name='.$userFullName.'" class="button">JOIN SUPER TRADER SIGNAL (PREMIUM ACCESS) & KLAIM BONUS 1 BULAN</a><br> 
                  <a href="https://ellen-may.com/support-ebook?name='.$userFullName.'"><img width="720px" src="http://ellen-may.com/images/banner/banner-premium-access.jpeg"></center></a>
                  
              </body>
            </html>​';

                    $field = [
                        'attachments' => $lampiran,
                        'subject' => 'Download Ebook "Cara Pensiun Muda & Kaya Ala Ellen May" Anda Sekarang',
                        'content' => $content,
                        'from'    => array(
                            'fromEmail' => 'noreply@ellen-may.com',
                            'fromName'  => 'Ellen May Institute'
                        ),
                        'personalizations' => $recipient_email
                    ];

                }else{

                    $content = '<!DOCTYPE html>
            <html>
              <head>
                <title></title>
                <style>
                a.button {
                  background-color: #4CAF50;
                  border: none;
                  color: #FFFFFF;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  margin: 4px 2px;
                  cursor: pointer;
                }
                a.button:visited {
                  color: #FFFFFF;
                }
                </style>
              </head>

              <body>
                <div>
                  <p>Halo '.$userFullName.',</p>

                  <p>Terima kasih sudah mendownload Ebook “3 CARA MUDAH JADI SUPER TRADER”.</p>
                  
                  <p>Sebagai apresiasi kami atas semangat '.$userFullName.', kami memberikan VOUCHER bonus 1 bulan gratis, untuk pembelian Super Trader Signal (Premium Access) yang terbatas hanya untuk 24 jam sejak mendownload ebook ini.</p>

                  <p>Cara pakainya mudah banget! Klik di sini <a href="https://ellen-may.com/support-ebook?name='.$userFullName.'">Klik disini</a> ya untuk menggunakan voucher tersebut.</p>
                  <p>Semoga bermanfaat!</p>
                  <br>
                  <br>
                  <p>Salam profit,</p>
                  <p>Ellen May</p> 
                  <center><a href="https://ellen-may.com/support-ebook?name='.$userFullName.'" class="button">JOIN SUPER TRADER SIGNAL (PREMIUM ACCESS) & KLAIM BONUS 1 BULAN</a><br> 
                  <a href="https://ellen-may.com/support-ebook?name='.$userFullName.'"><img width="720px" src="http://ellen-may.com/images/banner/banner-premium-access.jpeg"></center></a>
                  
              </body>
            </html>​';

                    $field = [
                        'attachments' => $lampiran,
                        'subject' => 'Download Ebook "3 Cara Mudah Jadi Super Trader" Anda Sekarang',
                        'content' => $content,
                        'from'    => array(
                            'fromEmail' => 'noreply@ellen-may.com',
                            'fromName'  => 'Ellen May Institute'
                        ),
                        'personalizations' => $recipient_email
                    ];

                }

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
                        'api_key: '.config("pepipost.api_key_pepipost"),
                        'content-type: application/json'
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);
                if($err){
                    Log::info($err);
                }
            }
        } catch (Exception $e) {
            Log::info($e);
            // dd($e->getMessage().' - '.$e->getLine());
        }
    }
}