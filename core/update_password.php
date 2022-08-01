<?php
session_start();
require_once('../db/config.php');
require_once('../const/check_session.php');

if ($role == "user") {
if (!empty($_POST['submit'])) {

$old_password = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$secret = password_hash($_POST['newpass'], PASSWORD_DEFAULT);

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT id, security FROM tbl_users WHERE id = ?");
$stmt->execute([$user_id]);
$result = $stmt->fetchAll();
if (count($result) < 1) {
$_SESSION['reply'] = "016";
header("location:../user");
}else{
foreach($result as $row) {
if (password_verify($old_password, $row['security'])) {
$stmt = $conn->prepare("UPDATE tbl_users SET security = ? WHERE id = ?");
$stmt->execute([$secret, $user_id]);
$_SESSION['reply'] = "012";
header("location:../user");
}else{
$_SESSION['reply'] = "016";
header("location:../user");
}
}
}
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
