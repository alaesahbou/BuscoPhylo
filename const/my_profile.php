<?php
try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $conn->prepare("SELECT * FROM tbl_reviews WHERE user = ?");
$stmt->execute([$user_id]);
$result = $stmt->fetchAll();
$my_reviews = count($result);

$stmt = $conn->prepare("SELECT * FROM tbl_comments WHERE user = ?");
$stmt->execute([$user_id]);
$result = $stmt->fetchAll();
$my_comments = count($result);


$stmt = $conn->prepare("SELECT * FROM tbl_user_plans WHERE user = ?");
$stmt->execute([$user_id]);
$result = $stmt->fetchAll();

if (count($result) > 0) {
foreach($result as $row) {
$expire__date = $row[4];

if (new DateTime() > new DateTime($expire__date)) {
  $plan_name = "Free Plan";
  $expire_date = "Forever";
} else {
  $plan_name = $row[2];

  $old_date = $expire__date;
  $old_date_timestamp = strtotime($old_date);
  $new_date = date('d M, Y h:i:s', $old_date_timestamp);
  $expire_date = $new_date;
}

}
}else{
  $plan_name = "Free Plan";
  $expire_date = "Forever";
}





}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
?>
