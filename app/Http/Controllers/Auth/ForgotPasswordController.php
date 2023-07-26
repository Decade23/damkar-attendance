<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\redirectTo;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    use redirectTo;

    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function sendResetLinkResponse(Request $request)
    {
        $this->validateEmail($request);

        $user = Sentinel::findByCredentials(['login' => $request->email]);

        if (!$user) {
            return $this->redirectFailed(route('auth.forgot.password.form'), __('auth.forgot_password_email_not_found'));
        }

        DB::beginTransaction();
        try {

            $reminder = Reminder::exists($user) ?: Reminder::create($user);
            $code     = $reminder->code;

            $link     = route('auth.reset.password.form', [$user->getUserId(), $code]);
            $security = route('auth.change.password.form');
            $content  = '<!DOCTYPE html>
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
                                                      <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:0px 0px 13px;line-height:1.6">Hai '.$user->name.', <br></p>
                                                      <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">We received a request to reset the password on your Ellen May Institute account.</p>
                                                      <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">To reset your password please follow the link below:</p>
                                                      <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6"><a href="'.route('auth.reset.password.form', [$user->getUserId(), $code]).'">'.route('auth.reset.password.form', [$user->getUserId(), $code]).'</a></p>
                                                      <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">If you did not initiate this password reset request, you can ignore this email.</p>
                                                      <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">You can also report it to us by contacting our team at accountsecurity@ellen-may.com.</p>
                                                      <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">If you suspect someone may have unauthorised access to your account, visit <a href="'.route('auth.change.password.form').'">'.route('auth.change.password.form').'</a> to change your password as a precaution.</p>
                                                      <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">Thanks.</p>
                                                      <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">Salam Profit.</p>
                                                      <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px 0px;line-height:1.6"><br></p>
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
                            </html>';

            $recipient_email[] = [
                'recipient' => $user->email
            ];

            $field = [
                'subject' => 'Instructions for changing your Membership Account password.',
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
                echo 'cURL Error #:' . $err;
            }
            else{
                echo $response;
            }

            DB::commit();

            return $this->redirectSuccessSend(route('auth.forgot.password.form'), __('auth.forgot_password_successful'));

        } catch (\Exception $exception) {

            DB::rollBack();

            dd($exception->getMessage().' '.$exception->getCode());

            return $this->redirectFailed(route('auth.forgot.password.form'), __('auth.forgot_password_unsuccessful'));

        }
    }
}
