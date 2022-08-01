<?php
session_start();
require_once("../../db/config.php");
require_once('../../const/check_session.php');

$item_id = $_SESSION['item'];

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$start = $_POST['row'];
$limit = 12;

$stmt = $conn->prepare("SELECT * FROM tbl_comments LEFT JOIN tbl_users ON tbl_comments.user = tbl_users.id WHERE tbl_comments.item = ? ORDER BY tbl_comments.id DESC LIMIT $start,$limit");
$stmt->execute([$item_id]);
$result = $stmt->fetchAll();

foreach($result as $row)
{
  $comm_date = $row[3];
  $old_date_timestamp = strtotime($comm_date);
  $new_date = date('d M, Y h:i:s A', $old_date_timestamp);

  ?>
  <li class="comments__item">
    <div class="comments__autor">
      <img class="comments__avatar" src="../../img/users/<?php echo $row[15]; ?>">
      <span class="comments__name"><?php echo $row[8]; ?> <?php echo $row[9]; ?> <?php if ($row[17] == "1") {print '<img id="verified" title="Verified Account" class="verification" src="../../img/check.svg">';} ?></span>
      <span class="comments__time"><?php echo $new_date; ?></span>
    </div>
    <p class="comments__text"><?php echo $row[4]; ?></p>

  </li>
  <?php
}
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

?>
