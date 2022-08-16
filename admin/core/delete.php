<?php
session_start();
require_once('../../db/config.php');
require_once('../../const/check_session.php');

if(isset($_GET['q']) && !empty($_GET['q'])){
    


try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("DELETE FROM tbl_items WHERE item_id = ?");
$stmt->execute([$_GET['q']]);
$_SESSION['reply'] = "011";
shell_exec('sudo rm '.dirname(dirname(__DIR__)).'/results.json');
header("location:../../");

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
} else {
    ?> <script> window.history.back(); </script> <?php
}