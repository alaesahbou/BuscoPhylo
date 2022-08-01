<?php
session_start();
require_once('../db/config.php');
require_once('../const/uniques.php');

$session_key = $_COOKIE['__key'];
setcookie("__logged", "0", time() - 3600);
setcookie("__key", "0", time() - 3600);

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("DELETE FROM tbl_sessions WHERE sessi_id = ?");
$stmt->execute([$session_key]);

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

header("location:./");
?>
