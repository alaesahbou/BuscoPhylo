<?php
session_start();
require_once('../db/config.php');
require_once('../const/uniques.php');
require_once('../const/web-info.php');

if (isset($_POST['submit'])) {

  $fname = ucwords($_POST['fname']);
  $lname = ucwords($_POST['lname']);
  $email = $_POST['email'];
  $username = $_POST['username'];
  $secret = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $acc_id = get_rand_numbers(8);
  $reg_date = date('d-m-Y');
  $role = "user";
  $red = $_POST['redirect'];

  try {
  $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = ? OR username = ?");
  $stmt->execute([$email, $rusername]);
  $result = $stmt->fetchAll();

  if (count($result) > 0) {

  foreach($result as $row) {
    if ($row[3] == $email) {

      $_SESSION['reply'] = "001";

      if ($red == "none") {
        header("location:../register");
      }else{
        header("location:../register?red=$red");
      }


    }else{
      if ($row[4] == $rusername) {

        $_SESSION['reply'] = "002";

        if ($red == "none") {
          header("location:../register");
        }else{
          header("location:../register?red=$red");
        }

      }
    }
  }


  }else{

  $stmt = $conn->prepare("INSERT INTO tbl_users (id, first_name, last_name, email, username, security, reg_date) VALUES (?,?,?,?,?,?,?)");
  $stmt->execute([$acc_id, $fname, $lname, $email, $username, $secret, $reg_date]);

  if ($red == "none") {
    $_SESSION['reply'] = "003";
    header("location:../register");
  }else{
    $cookie_length = "1440";
    $account_id = $acc_id;
    $session_id = md5(get_rand_numbers(12));
    $ip =  $_SERVER['REMOTE_ADDR'];

    $stmt = $conn->prepare("INSERT INTO tbl_sessions (user, sessi_id, ip_address) VALUES (?,?,?)");
    $stmt->execute([$account_id, $session_id, $ip]);

    setcookie("__logged", "1", time() + (60 * $cookie_length), "/");
    setcookie("__key", "$session_id", time() + (60 * $cookie_length), "/");


    header("location:$red");
  }

  }


  }catch(PDOException $e)
  {
  echo "Connection failed: " . $e->getMessage();
  }

}else{
  header("location:../");
}
?>
