<?php
$registered_users = 0;
$items_added = 0;
$sales_today = 0;
$sales_all_time = 0;

$today_date = date('d M Y');

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE role = 'user'");
$stmt->execute();
$result = $stmt->fetchAll();
$registered_users = count($result);

$stmt = $conn->prepare("SELECT * FROM tbl_items");
$stmt->execute();
$result = $stmt->fetchAll();
$items_added = count($result);

$stmt = $conn->prepare("SELECT * FROM tbl_transactions WHERE currency = ?");
$stmt->execute([AppISO]);
$result = $stmt->fetchAll();

foreach($result as $row) {
  $sales_all_time = $sales_all_time + $row[4];

  if ($today_date == $row[6]) {
    $sales_today = $sales_today + $row[4];
  }
}

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


?>
