<!DOCTYPE html>
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
                          <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:0px 0px 13px;line-height:1.6">Hai {{$user->name}}, <br></p>
                          <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">We received a request to reset the password on your Ellen May Institute account.</p>
                          <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">To reset your password please follow the link below:</p>
                          <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6"><a href="{{route('member.reset_password.form', [$user->getUserId(), $code])}}">{{route('member.reset_password.form', [$user->getUserId(), $code])}}</a></p>
                          <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">If you did not initiate this password reset request, you can ignore this email.</p>
                          <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">You can also report it to us by contacting our team at accountsecurity@ellen-may.com.</p>
                          <p class="m_4178287543717492059m_8500764122952422996bard-text-block m_4178287543717492059m_8500764122952422996style-scope" style="color:rgb(52,52,52);font-family:Helvetica,Arial,sans-serif;font-size:14px;padding:0px;margin:13px 0px;line-height:1.6">If you suspect someone may have unauthorised access to your account, visit <a href="{{route('member.security')}}">{{route('member.security')}}</a> to change your password as a precaution.</p>
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
</html>