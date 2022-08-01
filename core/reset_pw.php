<?php
session_start();
require_once('../db/config.php');
require_once('../const/check_session.php');

if (isset($_SESSION['reset_ac'])) {
if (!empty($_SESSION['reset_ac'])) {

$newpass = $_POST['password'];
$secret = password_hash($_POST['password'], PASSWORD_DEFAULT);

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("UPDATE tbl_users SET security = ? WHERE id = ?");
$stmt->execute([$secret, $_SESSION['acc_id']]);

$stmt = $conn->prepare("DELETE FROM tbl_reset_tokens WHERE email = ?");
$stmt->execute([$email]);

unset($_SESSION['reset_ac']);
unset($_SESSION['acc_id']);

$_SESSION['reply'] = "029";
header("location:../login");


}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{
header("location:../");
}
}else{
header("location:../");
}
?>
