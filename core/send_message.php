<?php
require_once('../db/config.php');
require_once('../const/mail.php');
require_once('../const/web-info.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../mail/src/Exception.php';
require '../mail/src/PHPMailer.php';
require '../mail/src/SMTP.php';

$first_name = ucwords($_GET['first_name']);
$img = '<img src="http://196.200.148.23/img/logo-1.png" style="height:70px;" />';
$email = $_GET['email'];
$message = $_GET['message'];
$mail_subject = ucwords($_GET['subject']);
$mail_message = '<body class="" style="background-color: #006400;font-family: Montserrat;-webkit-font-smoothing: antialiased;font-size: 16px;line-height: 1.4;margin: 0;padding: 0;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
          <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;background-color: #006400;">
            <tr>
              <td style="font-family: Montserrat;font-size: 16px;vertical-align: top;">&nbsp;</td>
              <td class="container" style="font-family: Montserrat;font-size: 16px;vertical-align: top;display: block;max-width: 580px;padding: 10px;width: 580px;margin: 0 auto !important;">
                <div class="content" style="box-sizing: border-box;display: block;margin: 0 auto;max-width: 580px;padding: 10px;">

                  <table role="presentation" class="main" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;background: #088443;border-radius: 3px;color: white !important;">
                    <tr>
                      <td class="wrapper" style="font-family: Montserrat;font-size: 16px;vertical-align: top;box-sizing: border-box;padding: 20px;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;">
                          <tr>
                            <td style="font-family: Montserrat;font-size: 16px;vertical-align: top;">
                              '.$img.'
                              <p style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: white;">'.$message.'<br><hr style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: white;"><b style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: #FFA500;">Sender Information</b><br><p style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: white;">Name : '.$first_name.'<br>Email : '.$email.'</p></p>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>

                  <div class="footer" style="clear: both;margin-top: 10px;text-align: center;width: 100%;">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;">
                      <tr>
                        <td class="content-block" style="font-family: Montserrat;font-size: 12px;vertical-align: top;padding-bottom: 10px;padding-top: 10px;color: white;text-align: center;">
                          <span class="apple-link" style="color: white;font-size: 12px;text-align: center;">'.AppName.', All rights reserved '.date('Y').'</span>
                        </td>
                      </tr>
                      <tr>
                        <td class="content-block powered-by" style="font-family: Montserrat;font-size: 12px;vertical-align: top;padding-bottom: 10px;padding-top: 10px;color: #FFA500;text-align: center;">
                          Powered by BBPA.
                        </td>
                      </tr>
                    </table>
                  </div>

                </div>
              </td>
              <td style="font-family: Montserrat;font-size: 16px;vertical-align: top;">&nbsp;</td>
            </tr>
          </table>
      </body>';

$mail = new PHPMailer;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->isSMTP();
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Host = $mymail_server;
$mail->SMTPAuth = true;
$mail->Username = $mymail_user;
$mail->Password = $mymail_password;
$mail->SMTPSecure = $mymail_conn;
$mail->Port = $mymail_port;

$mail->setFrom($mymail_user, AppName);
$mail->addAddress('slimane.khayi@inra.ma');

$mail->isHTML(true);

$mail->Subject = $mail_subject;
$mail->Body    = $mail_message;
$mail->AltBody = $mail_message;

if(!$mail->send()) {
print '
<div class="alert alert-danger" role="alert">
Mailer Error: ' . $mail->ErrorInfo.';
</div>
';
} else {
print '
<div class="alert alert-success" role="alert">
Your message was sent.
</div>
';
}

?>
