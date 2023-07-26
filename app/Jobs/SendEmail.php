<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use Illuminate\Support\Facades\Log;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $type;
    protected $posts;
    protected $users;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type, $posts, $users)
    {
        $this->type  = $type;
        $this->posts = $posts;
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
        $type  = $this->type;
        $post  = $this->posts;
        $users = $this->users;
        if($users != null){
          foreach ($users as $user) {
            $recipient_email[] = [
                'recipient'  => $user->email,
                'attributes' => array(
                  'NAME' => $user->name
                )
            ];
          }
            if($type == 'hot-lists'){
                $content = '<!DOCTYPE html>
                              <html>
                                <head>
                                </head>
                                <body>
                                  <div id="mainContent" style="text-align: start;">
                                    <table cellpadding="10" cellspacing="0" style="background-color: rgb(255,255,255); width: 100%; height: 100%;">
                                      <tbody>
                                        <tr>
                                          <td valign="top">
                                            <table align="center" cellpadding="0" cellspacing="0">
                                              <tbody>
                                                <tr>
                                                  <td>
                                                    <table bgcolor="#FFFFFF" cellpadding="20" cellspacing="0" style="width: 600px; background-color: rgb(255,255,255);">
                                                      <tbody>
                                                        <tr>
                                                          <td sectionid="body" style="text-align: start; margin: 0; padding: 20px; border: none; white-space: normal; line-height: normal; background-color: rgb(255,255,255);" valign="top">
                                                            <div>
                                                              <div contentid="logo">
                                                                <div contentid="logo">
                                                                  <div style="text-align: center;">
                                                                    <img align="bottom" alt="Company Logo" border="0" height="200" src="https://ellen-may.com/images/super-trader-signal-id.png" style="margin: 0; margin-right: 0px; margin-left: 0px; padding: 0; background: none; border: none; white-space: normal; line-height: normal;" title="Company Logo" width="370" />
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div>
                                                              <div style="height: 20px;">
                                                                <div style="height: 10px; border-bottom: 1px solid rgb(204,204,204);">
                                                                  &nbsp;
                                                                </div>
                                                                <div style="height: 10px;">
                                                                  &nbsp;
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div>
                                                              <div style="margin: 0; padding: 0; background: none; border: none; white-space: normal; line-height: normal; overflow: visible; color: rgb(0,0,0); font-size: 12px; font-family: arial;">
                                                                <div contentid="paragraph" style="margin: 0; padding: 0; background: none; border: none; white-space: normal; line-height: normal; overflow: visible; color: rgb(0,0,0); font-size: 12px; font-family: arial;">
                                                                  <div style="overflow: visible;">
                                                                    <div style="overflow: visible;">
                                                                      <span data-mce-mark="1" style="font-family: helvetica; font-size: 12pt;"><span style="font-family: helvetica; font-size: 13pt;">Good morning </span>[%NAME%]</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span data-mce-mark="1" style="font-family: helvetica; font-size: 13pt;">&nbsp;</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span style="font-family: helvetica; font-size: 13pt;">'.$post->content.'</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span style="font-family: helvetica; font-size: 13pt;">Please do not reply this email, contact support@ellen-may.com for technical support and info@ellen-may.com for other information.</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span data-mce-mark="1" style="font-family: helvetica; font-size: 13pt;">&nbsp;</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span style="font-family: helvetica; font-size: 13pt;">Faster response : call 0823 - 2722 - 9009</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span data-mce-mark="1" style="font-family: helvetica; font-size: 13pt;">&nbsp;</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span style="font-family: helvetica; font-size: 13pt;"><b>Disclaimer :</b></span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span data-mce-mark="1" style="font-family: helvetica; font-size: 13pt;">&nbsp;</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span style="font-family: helvetica; font-size: 13pt;">Setiap rekomendasi saham dalam The Ellen May Premium Access ini bersifat sebagai referensi / bahan pertimbangan, dan bukan merupakan perintah beli / jual. Setiap keuntungan dan kerugian menjadi tanggung jawab dari pelaku pasar.</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span data-mce-mark="1" style="font-family: helvetica; font-size: 13pt;">&nbsp;</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span style="font-family: helvetica; font-size: 13pt;">Call to action yang dikirim melalui Telegram Channel bersifat sebagai pengingat dan bisa saja terjadi delay dalam pengiriman karena faktor jaringan / koneksi, baik dari kami maupun jaringan Anda. Jadi, jagai setiap level key action strategy Anda dengan mandiri</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span data-mce-mark="1" style="font-family: helvetica; font-size: 12pt;">&nbsp;</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span style="font-family: helvetica; font-size: 13pt;"><b>Copyright : Ellen May Institute</b></span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span data-mce-mark="1" style="font-family: helvetica; font-size: 13pt;">&nbsp;</span>
                                                                    </div>
                                                                    <div style="overflow: visible;">
                                                                      <span style="font-family: helvetica; font-size: 13pt;">Dilarang mengutip, dan meneruskan sebagian atau seluruh isi dari materi ini, tanpa seijin pihak Ellen May Institute. Hak cipta dilindungi undang-undang</span>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                          <td sectionid="footer" style="text-align: start; margin: 0; padding: 20px; border: none; white-space: normal; line-height: normal; background-color: rgb(255,255,255);" valign="top">
                                                            <p style="font-family:Helvetica,Arial,sans-serif;padding:0px;margin:13px 0px 0px;line-height:1.6;color:rgb(153,153,153);font-size:11px">Ellen May Institute Ruko Sentra Niaga Puri Indah Blok T1 No 12A, Puri Kembangan Jakarta Barat, Jakarta Raya Indonesia +6282327229009</p>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </body>
                              </html>​';
            }
            else if($type == 'kopipagi'){
                $content = '<html>
                              <head>
                              </head>
                              <body>
                                <div id="mainContent" style="text-align: start;">
                                  <table cellpadding="10" cellspacing="0" style="background-color: rgb(255,255,255); width: 100%; height: 100%;">
                                    <tbody>
                                      <tr>
                                        <td valign="top">
                                          <table align="center" cellpadding="0" cellspacing="0">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table bgcolor="#FFFFFF" cellpadding="20" cellspacing="0" style="width: 600px; background-color: rgb(255,255,255);">
                                                    <tbody>
                                                      <tr>
                                                        <td sectionid="body" style="text-align: start; margin: 0; padding: 20px; border: none; white-space: normal; line-height: normal; background-color: rgb(255,255,255);" valign="top">
                                                          <div>
                                                            <div contentid="logo">
                                                              <div contentid="logo">
                                                                <div style="text-align: center;">
                                                                  <img align="bottom" alt="Company Logo" border="0" height="200" src="https://ellen-may.com/images/logo-ellen-may.png" style="margin: 0; margin-right: 0px; margin-left: 0px; padding: 0; background: none; border: none; white-space: normal; line-height: normal;" title="Company Logo" width="370" />
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div>
                                                            <div style="height: 20px;">
                                                              <div style="height: 10px; border-bottom: 1px solid rgb(204,204,204);">
                                                                &nbsp;
                                                              </div>
                                                              <div style="height: 10px;">
                                                                &nbsp;
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div>
                                                            <div style="margin: 0; padding: 0; background: none; border: none; white-space: normal; line-height: normal; overflow: visible; color: rgb(0,0,0); font-size: 12px; font-family: arial;">
                                                              <div contentid="paragraph" style="margin: 0; padding: 0; background: none; border: none; white-space: normal; line-height: normal; overflow: visible; color: rgb(0,0,0); font-size: 12px; font-family: arial;">
                                                                <div style="overflow: visible;">
                                                                  <div style="overflow: visible;">
                                                                    <span data-mce-mark="1" style="font-family: helvetica; font-size: 13pt;"><span style="font-family: helvetica; font-size: 12pt;">Good morning </span>[%NAME%]</span>
                                                                  </div>
                                                                  <div style="overflow: visible;">
                                                                    <span data-mce-mark="1" style="font-family: helvetica; font-size: 13pt;">&nbsp;</span>
                                                                  </div>
                                                                  <div style="overflow: visible;">
                                                                    <span style="font-family: helvetica; font-size: 13pt;">'.$post->content.'</span>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td sectionid="footer" style="text-align: start; margin: 0; padding: 20px; border: none; white-space: normal; line-height: normal; background-color: rgb(255,255,255);" valign="top">
                                                          <p style="font-family:Helvetica,Arial,sans-serif;padding:0px;margin:13px 0px 0px;line-height:1.6;color:rgb(153,153,153);font-size:11px">Ellen May Institute Ruko Sentra Niaga Puri Indah Blok T1 No 12A, Puri Kembangan Jakarta Barat, Jakarta Raya Indonesia +6282327229009</p>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </body>
                            </html>';
            }
            else{
                $content = '';
            }

            if($type == 'hot-lists'){
              $field = [
                  'subject' => $post->name,
                  'content' => $content,
                  'from'    => array(
                      'fromEmail' => 'noreply@ellen-may.com',
                      'fromName'  => 'Super Trader Signal (Premium Access)'
                  ),
                  'personalizations' => $recipient_email
              ];
            }
            else if($type == 'kopipagi'){
              $field = [
                  'subject' => $post->name,
                  'content' => $content,
                  'from'    => array(
                      'fromEmail' => 'noreply@ellen-may.com',
                      'fromName'  => 'Ellen May Institute'
                  ),
                  'personalizations' => $recipient_email
              ];
            }
            else{
              $field = [
                  'subject' => $post->name,
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
