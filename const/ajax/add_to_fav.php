<?php
session_start();
require_once("../../db/config.php");
require_once('../../const/check_session.php');

if ($role == "user") {
$fav_item = $_GET['item'];
try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_favourites WHERE user = ? AND item = ?");
$stmt->execute([$user_id, $fav_item]);
$result = $stmt->fetchAll();

if (count($result) > 0) {
?><button class='article__favorites' type='button'>Item is already added</button><?php
}else{
$stmt = $conn->prepare("INSERT INTO tbl_favourites (user, item) VALUES (?,?)");
$stmt->execute([$user_id, $fav_item]);
?><button class='article__favorites' type='button'>Added to favorites</button><?php
}

}catch(PDOException $e)
{

}

}else{

}
?>
