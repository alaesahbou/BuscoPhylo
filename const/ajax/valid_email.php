<?php
session_start();
require_once("../../db/config.php");
if (isset($_GET['email'])) {
$email = $_GET['email'];

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = ?");
$stmt->execute([$email]);
$result = $stmt->fetchAll();

if (count($result) > 0) {
echo "Email address is not available";
}else{

}

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}
?>
