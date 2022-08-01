<?php

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $conn->prepare("SELECT * FROM tbl_smtp");
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row)
{
  $mymail_server = $row[0];
  $mymail_user = $row[1];
  $mymail_password = $row[2];
  $mymail_conn = $row[3];
  $mymail_port = $row[4];
 }


}catch(PDOException $e)
{

}


?>
