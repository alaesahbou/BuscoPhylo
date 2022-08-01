<?php
session_start();
require_once('../db/config.php');
require_once('../const/uniques.php');
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $secret = $_POST['password'];

  if (!empty($_POST['remember'])) {
    $cookie_length = "20160";
  }else{
    $cookie_length = "1440";
  }

  $red = $_POST['redirect'];

  try

  {
  $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE username = ?");
  $stmt->execute([$username]);
  $result = $stmt->fetchAll();
  if (count($result) < 1) {
  $_SESSION['reply'] = "004";
  header("location:../login");
  }else{
  foreach($result as $row)
  {
    $account_id = $row[0];
    $session_id = md5(get_rand_numbers(12));
    $ip =  $_SERVER['REMOTE_ADDR'];
    $loc = $row[9];
    if ($row[5] == "0") {
      $_SESSION['reply'] = "005";
      header("location:../login");
    }else{
      if (password_verify($secret, $row[6])) {

        $stmt = $conn->prepare("DELETE FROM tbl_sessions WHERE user = ?");
        $stmt->execute([$account_id]);

        $stmt = $conn->prepare("INSERT INTO tbl_sessions (user, sessi_id, ip_address) VALUES (?,?,?)");
        $stmt->execute([$account_id, $session_id, $ip]);

        setcookie("__logged", "1", time() + (60 * $cookie_length), "/");
        setcookie("__key", "$session_id", time() + (60 * $cookie_length), "/");

        if ($red == "none") {
          header("location:../$loc");
        }else{
          header("location:$red");
        }

      }else{
      $_SESSION['reply'] = "004";
      header("location:../login");
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
