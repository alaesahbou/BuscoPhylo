<?php
session_start();
require_once("../../db/config.php");
require_once('../../const/check_session.php');

if ($role == "admin") {
$genre = $_GET['node'];
try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_genres WHERE id = ?");
$stmt->execute([$genre]);
$result = $stmt->fetchAll();

foreach($result as $row)
{
?>

<div class="row">
  <div class="col-12">
    <div class="form__group">
      <input value="<?php echo $row[1]; ?>" name="genre" required type="text" class="form__input form_control txt-cap" placeholder="Enter Genre">
    </div>
  </div>
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">

</div>

<div class="modal__btns">
  <button name="submit" value="1" class="modal__btn modal__btn--apply" type="submit">Save Changes</button>

</div>

<?php
}
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{

}
?>
