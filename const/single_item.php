<?php
if (isset($_GET['key'])) {
$item_id = $_GET['key'];
$_SESSION['item'] = $item_id;
try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_items WHERE item_id = ? AND status = 'Visible'");
$stmt->execute([$item_id]);
$result = $stmt->fetchAll();
if (count($result) < 1) {
  header("location:../../");
}

foreach($result as $row)
{
$st1 = preg_replace("/[^a-zA-Z]/", " ", $row[1]);
$st2 =  preg_replace('/\s+/', ' ', $st1);
$item_title = strtolower(str_replace(' ', '-', $st2));

$title = $row[1];
$description = $row[3];
$year = $row[4];
$run_time = $row[5];
$plan = $row[6];
$age = $row[7];
$type = $row[8];
$genres = (explode(",",$row[9]));
$thumbnail = $row[10];
$trailer = $row[11];
$upload_date = $row[12];
$rates = $row[14];
$views = $row[15];

if ($rates < 10) {
  $rates = ''.$rates.'.0';
}
}
}catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}


}else{
header("location:../../");
}

?>
