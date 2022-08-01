<?php
session_start();
require_once("../../db/config.php");
require_once('../../const/check_session.php');

if ($role == "user") {
$fav_item = $_GET['node'];
try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("DELETE FROM tbl_favourites WHERE id = ? AND user = ?");
$stmt->execute([$fav_item, $user_id]);

}catch(PDOException $e)
{

}

}else{

}
?>
