<?php
session_start();
require_once("../../db/config.php");
require_once('../../const/check_session.php');
require_once('../../const/web-info.php');

if ($role == "admin") {
$plan = $_GET['node'];
try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_plans WHERE id = ?");
$stmt->execute([$plan]);
$result = $stmt->fetchAll();

foreach($result as $row)
{
?>

<div class="row">

  <div class="col-12">
    <div class="form__group">
      <label class="label_white">Plan Name</label>
      <input value="<?php echo $row[1]; ?>" name="plan" required type="text" class="form__input form_control txt-up" placeholder="Enter Plan Name">
    </div>
  </div>

  <div class="col-12">
    <div class="form__group">
        <label class="label_white">Valid Type</label>
      <select name="valid_type" required class="form__input form_control">
        <option <?php if ($row[4] == "Days") { print'selected';} ?> value="Days">Days</option>
        <option <?php if ($row[4] == "Months") { print'selected';} ?> value="Months">Months</option>
        <option <?php if ($row[4] == "Years") { print'selected';} ?> value="Years">Years</option>
      </select>
    </div>
  </div>

  <div class="col-12">
    <div class="form__group">
      <label class="label_white">Valid</label>
      <input value="<?php echo $row[2]; ?>" name="valid" required type="number" class="form__input form_control" placeholder="Enter Valid">
    </div>
  </div>

  <div class="col-12">
    <div class="form__group">
      <label class="label_white">Price (<?php echo strtoupper(AppISO); ?>)</label>
      <input value="<?php echo $row[3]; ?>" name="price" required type="number" class="form__input form_control" placeholder="Enter Valid">
    </div>
  </div>

  <div class="col-12">
    <div class="form__group">
        <label class="label_white">Maximum Size</label>
      <select name="max_size" required class="form__input form_control">
        <option <?php if ($row[5] == "480") { print'selected';} ?> value="480">480p</option>
        <option <?php if ($row[5] == "720") { print'selected';} ?> value="720">720p</option>
        <option <?php if ($row[5] == "1080") { print'selected';} ?> value="1080">1080p</option>
      </select>
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
