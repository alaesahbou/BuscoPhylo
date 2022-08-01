<?php
session_start();
require_once("../../db/config.php");
require_once('../../const/check_session.php');

$item_id = $_SESSION['item'];

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$start = $_POST['rowb'];
$limit = 12;

$stmt = $conn->prepare("SELECT * FROM tbl_reviews LEFT JOIN tbl_users ON tbl_reviews.user = tbl_users.id WHERE tbl_reviews.item = ? ORDER BY tbl_reviews.id DESC LIMIT $start,$limit");
$stmt->execute([$item_id]);

$result = $stmt->fetchAll();

foreach($result as $row)
{
  $comm_date = $row[4];
  $old_date_timestamp = strtotime($comm_date);
  $new_date = date('d M, Y h:i:s A', $old_date_timestamp);
  if ($row[5] < 10) {
  $rates = ''.$row[5].'0';
  }else{
  $rates = $row[5];
  }

  ?>
  <li class="reviews__item">
    <div class="reviews__autor">
      <img class="reviews__avatar" src="../../img/users/<?php echo $row[15]; ?>" alt="">
      <span class="reviews__name"><?php echo $row[3]; ?></span>
      <span class="reviews__time"><?php echo $new_date; ?> by <?php echo $row[11]; ?> <?php if ($row[17] == "1") {print '<img id="verified" title="Verified Account" class="verification_small" src="../../img/check.svg">';} ?></span>
      <span class="reviews__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $rates; ?></span>
    </div>
    <p class="reviews__text"><?php echo $row[6]; ?></p>
  </li>
  <?php
}
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

?>
