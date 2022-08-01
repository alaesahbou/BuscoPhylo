<?php
session_start();
require_once('../db/config.php');
require_once('../const/uniques.php');

require_once('../const/web-info.php');
require_once('../const/check_session.php');
require_once('../const/mail.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../mail/src/Exception.php';
require '../mail/src/PHPMailer.php';
require '../mail/src/SMTP.php';

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $reset = $_POST['reset'];

  try

  {
  $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = ?");
  $stmt->execute([$email]);
  $result = $stmt->fetchAll();
  if (count($result) < 1) {
  $_SESSION['reply'] = "025";
  header("location:../recover?t=$reset");
  }else{
  foreach($result as $row)
  {
    $account = $row[0];
    $first_name = $row[1];
    $last_name = $row[2];
    $username = $row[4];

    $red = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST']. explode('?', $_SERVER['REQUEST_URI'], 2)[0];
    $img = '<img src="http://196.200.148.23/img/logo-1.png" style="height:70px;" />';
    $red_link = str_replace("core/reset_account","img/$img",$red);
    $login_link = str_replace("core/reset_account","login",$red);
    $domain_link = str_replace("core/reset_account","",$red);

    if ($reset == "1") {
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
                              <p style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: white;">Hi '.$first_name.',</p>
                              <p style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: white;">A username reminder has been requested for your '.AppName.' account.</p>
                              <p style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: white;">Your username is '.$username.'.</p>
                              <p style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: white;">To login to your account click <a href="'.$login_link.'" style="color: #FFA500;">here</a>.</p>
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

      $mail_subject = "Username Reminder";

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

      $mail->setFrom('BBPA@BBPA.ma', AppName);
      $mail->addAddress($email);

      $mail->isHTML(true);

      $mail->Subject = $mail_subject;
      $mail->Body    = $mail_message;
      $mail->AltBody = $mail_message;

      if(!$mail->send()) {
        $_SESSION['reply'] = "027";
        header("location:../recover?t=$reset");
      } else {
        $_SESSION['reply'] = "026";
        header("location:../login");
      }


    }else{
      if ($reset == "2") {
        $stmt = $conn->prepare("DELETE FROM tbl_reset_tokens WHERE email = ?");
        $stmt->execute([$email]);

        $token = md5(get_rand_numbers(13));

        $stmt = $conn->prepare("INSERT INTO tbl_reset_tokens (account, token, email) VALUES (?,?,?)");
        $stmt->execute([$account, $token, $email]);

        $reset_link = str_replace("core/reset_account","reset_pw?token=$token",$red);


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
                                <p style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: white;">Hi '.$first_name.',</p>
                                <p style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: white;">We received a password help request submitted via <a href="'.$domain_link.'" style="color: #FFA500;">'.$domain_link.'</a>.
                                If you want to change your '.AppName.' password, click on the link below or copy and paste it on your address bar.</p>
                                <p style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: #FFA500;"><a href="'.$reset_link.'" style="color: #FFA500;">'.$reset_link.'</a></p>
                                <p style="font-family: Montserrat;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;color: white;">Thank you.</p>
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

        $mail_subject = "Password Reset";

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
        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = $mail_subject;
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;

        if(!$mail->send()) {
          $_SESSION['reply'] = "027";
          header("location:../recover?t=$reset");
        } else {
          $_SESSION['reply'] = "026";
          header("location:../login");
        }

      }
    }
  }
  }

  }catch(PDOException $e)
  {

  }


}else{
  header("location:../");
}
?>
