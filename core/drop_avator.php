<?php
session_start();
require_once('../db/config.php');
require_once('../const/check_session.php');

if ($role == "user") {

if ($image == "user.svg") {
header("location:../user");
}else{
unlink("../img/users/$image");

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("UPDATE tbl_users SET image = 'user.svg' WHERE id = ?");
$stmt->execute([$user_id]);
$_SESSION['reply'] = "012";
header("location:../user");

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}

}else{
header("location:../");
}
?>
