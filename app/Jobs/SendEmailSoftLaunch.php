<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use Illuminate\Support\Facades\Log;

class SendEmailSoftLaunch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $users;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      try {
        $users = $this->users;
        if($users != null){
          foreach ($users as $user) {
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
          }
          $content = '<!DOCTYPE html>
                      <html>
                        <head>
                          <title></title>
                        </head>
                        <body>
                          <div style="max-width:600px;background:rgb(255,255,255) none repeat scroll 0% 0%;margin:0px auto">
                            <table style="font-size:0px;width:100%;background:rgb(255,255,255) none repeat scroll 0% 0%" align="center" cellspacing="0" cellpadding="0" border="0">
                              <tbody>
                                <tr>
                                  <td style="text-align:center;vertical-align:top;font-size:0px">
                                    <div class="m_-2031116837044027653m_-181961659305639231column m_-2031116837044027653m_-181961659305639231column-100" style="display:inline-block;width:100%;vertical-align:top">
                                      <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                          <tr>
                                            <td class="m_4178287543717492059m_8500764122952422996alignmentContainer" style="word-break:break-word;font-size:0px;padding:0px;text-align:center">
                                              <img src="https://ellen-may.com/images/logo-ellen-may.png" alt="image" width="258" style="font-family:Helvetica,Arial,sans-serif;font-size:20px;width:43%">
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div style="max-width:600px;background:rgb(255,255,255) none repeat scroll 0% 0%;margin:0px auto">
                            <table style="font-size:0px;width:100%;background:rgb(255,255,255) none repeat scroll 0% 0%" align="center" cellspacing="0" cellpadding="0" border="0">
                              <tbody>
                                <tr>
                                  <td style="text-align:center;vertical-align:top;font-size:0px">
                                    <div class="m_-2031116837044027653m_-181961659305639231column m_-2031116837044027653m_-181961659305639231column-100" style="display:inline-block;width:100%;vertical-align:top">
                                      <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                          <tr>
                                            <td style="font-size:0px;padding:15px;text-align:left">
                                              <div>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:0px 0px 13px;line-height:1.6">Halo [%NAME%],<br></p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:0px 0px 13px;line-height:1.6"><img src="https://ellen-may.com/images/email-miss-ellen-may.png" alt="image" width="30%;"></p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">Senang sekali bisa membantu [%NAME%] selama ini melalui layanan Premium Access. Saat ini Premium Access mulai akan bertransformasi menjadi Super Trader SIGNAL.</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">Yes! We are proudly present Super Trader SIGNAL [beta version] ! Layanan rekomendasi dan edukasi terbaru dari Ellen May Institute</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">Apa sih bedanya?</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">Yang jelas, selain tampilan baru dan juga system delivery pesan yang lebih baik, Super Trader SIGNAL memberikan manfaat lebih buat [%NAME%] dalam hal :</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-left:20px;margin:13px 0px;line-height:1.6">-  Bisa melakukan manajemen resiko dan portfolio lebih praktis karena ada tools-tools baru yang membuat [%NAME%] lebih mudah dalam menentukan berapa banyak saham boleh dibeli, dan bagaimana [%NAME%] bisa menjaga risiko tetap minim.</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-left:20px;margin:13px 0px;line-height:1.6">-  Sistem baru, akan membuat [%NAME%] semakin mudah menerima pesan dari kami, dan proses belajar pun menjadi lebih praktis. Ke depannya… harapan kami, kita nggak lagi tergantung dengan aplikasi Telegram supaya kalau Telegram lagi error kita tetap bisa trading dengan baik.</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">Bagaimana cara menggunakan system baru Super Trader Signal?</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">Berikut cara login nya ya:</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">Member area baru (Super Trader Signal) : <a href="https://ellen-may.com/member/login">https://ellen-may.com/member/login</a></p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">ID : [%EMAIL%]</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Password : D9RajJi6[%PHONE%] (Mohon ganti password Anda)</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">Tutorial member area baru : <a href="https://ellen-may.com/member/tutorial">https://ellen-may.com/member/tutorial</a></p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Tunggu apa lagi, yuk langsung dicoba ya system baru kita.</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Oya, system baru untuk Super Trader SIGNAL saat ini masih dalam pengembangan. Oleh karena itu, system lama (Premium Access) masih bisa digunakan untuk mem-back-up system baru.</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Cara untuk menggunakan system lama (Premium Access) : </p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Klik URL : <a href="https://premiumaccess.id/users/sign_in">https://premiumaccess.id/users/sign_in</a></p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Untuk akses ke platform lama, [%NAME%] dapat menggunakan ID dan Password yang sebelumnya ya.</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Kami juga membuka masukan dan saran untuk system baru kita, silakan kirimkan ke whatsapp +62 817 17716877 atau bisa juga klik url berikut ini <a href="https://ellen-may.com/member/service">https://ellen-may.com/member/service</a></p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Terima kasih & salam profit!</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Ellen May</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Super Trader Signal (Premium Access)</p>
                                                <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;padding-top:0px;line-height:1.6">Ellen May Institute</p>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div style="max-width:600px;background:rgb(255,255,255) none repeat scroll 0% 0%;margin:0px auto">
                            <table style="font-size:0px;width:100%;background:rgb(255,255,255) none repeat scroll 0% 0%" align="center" cellspacing="0" cellpadding="0" border="0">
                              <tbody>
                                <tr>
                                  <td style="text-align:center;vertical-align:top;font-size:0px">
                                    <div class="m_-2031116837044027653m_-181961659305639231column m_-2031116837044027653m_-181961659305639231column-100" style="display:inline-block;width:100%;vertical-align:top">
                                      <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                          <tr>
                                            <td style="font-size:0px;padding:15px;text-align:center" class="m_-2031116837044027653m_-181961659305639231alignmentContainer">
                                              <div style="margin-left:auto;margin-right:auto">
                                                <p style="font-family:Helvetica,Arial,sans-serif;padding:0px;margin:13px 0px 0px;line-height:1.6;color:rgb(153,153,153);font-size:11px">Ellen May Institute Ruko Sentra Niaga Puri Indah Blok T1 No 12A, Puri Kembangan Jakarta Barat, Jakarta Raya Indonesia +6282327229009</p>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                           </div>
                        </body>
                      </html>​';

            $field = [
                'subject' => 'Premium Access is transforming to Super Trader Signal [Soft Launch]',
                'content' => $content,
                'from'    => array(
                    'fromEmail' => 'noreply@ellen-may.com',
                    'fromName'  => 'Ellen May Institute'
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
      } catch (Exception $e) {
        Log::info($e);
      }
    }
}
