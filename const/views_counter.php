<?php
$ip =  $_SERVER['REMOTE_ADDR'];

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_views WHERE item = ? AND ip = ?");
$stmt->execute([$item_id, $ip]);
$result = $stmt->fetchAll();
if (count($result) < 1) {
$view_date = date('Y-m-d h:i:s');
$stmt = $conn->prepare("INSERT INTO tbl_views (item, ip, view_date) VALUES (?,?,?)");
$stmt->execute([$item_id, $ip, $view_date]);

$stmt = $conn->prepare("UPDATE tbl_items SET views = views + 1 WHERE item_id = ?");
$stmt->execute([$item_id]);

}

}catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}


?>
