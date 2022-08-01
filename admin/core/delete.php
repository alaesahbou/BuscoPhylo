<?php
session_start();
require_once('../../db/config.php');
require_once('../../const/check_session.php');

if(isset($_GET['q']) && !empty($_GET['q'])){
    


try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_items WHERE item_id = ?");
$stmt->execute([$_GET['q']]);

$result = $stmt->fetchAll();
$path=$_SERVER["DOCUMENT_ROOT"].'/admin/core';

                                      foreach($result as $row)
                                      {
                                          $dir = $row[3];
                                          $_SESSION['proj_name'] = $row[1];
                                      }
                                      rmdir(''.$dir.'');
$stmt = $conn->prepare("DELETE FROM tbl_items WHERE item_id = ?");
$stmt->execute([$_GET['q']]);
$_SESSION['reply'] = "011";
header("location:../../");

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
} else {
    ?> <script> window.history.back(); </script> <?php
}