<?php
if(!isset($_COOKIE["__logged"])) {
$res = "0";
} else {

if(!isset($_COOKIE["__key"])) {
$res = "0";
}else{
$session_key = $_COOKIE["__key"];
$current_ip = $_SERVER['REMOTE_ADDR'];

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $conn->prepare("SELECT * FROM tbl_sessions LEFT JOIN tbl_users ON tbl_sessions.user = tbl_users.id WHERE tbl_sessions.sessi_id = ?");
$stmt->execute([$session_key]);
$result = $stmt->fetchAll();

if (count($result) < 1) {
$res = "0";
}else{
foreach($result as $row)
{
$session_ip = $row[2];
$user_id = $row[3];
$fname = $row[4];
$lname = $row[5];
$email = $row[6];
$rusername = $row[7];
$acc_status = $row[8];
$reg_date = $row[10];
$image = $row[11];
$role = $row[12];
$badge = $row[13];
}

if ($current_ip == $session_ip) {
if ($acc_status == "1") {
$res = "1";
}else{
$res = "2";
}
}else{
$res = "3";
}
}

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}
}
?>
