<?php
session_start();
require_once('../db/config.php');
require_once('../const/web-info.php');

if (isset($_GET['token'])) {
  $token = $_GET['token'];

  try

  {
  $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("SELECT * FROM tbl_reset_tokens WHERE token = ?");
  $stmt->execute([$token]);
  $result = $stmt->fetchAll();
  if (count($result) < 1) {
  $_SESSION['reply'] = "028";
  header("location:./login");
  }else{
  foreach($result as $row)
  {
    $account = $row[1];
    $token = $row[2];
    $email = $row[3];

    $_SESSION['reset_ac'] = "1";
    $_SESSION['acc_id'] = $account;
  }
  }

  }catch(PDOException $e)
  {

  }
}else{
  header("location:./");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/slider-radio.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/main.css">
  <link type="text/css" rel="stylesheet" href="plugins/loader/waitMe.css">
	<link rel="icon" href="icon/<?php echo AppIcon; ?>" sizes="32x32">
	<meta name="description" content="<?php echo AppDesc; ?>">
	<meta name="keywords" content="<?php echo AppKeywords; ?>">
	<meta name="author" content="Bwire Mashauri">
	<title><?php echo AppName; ?> – Change Password</title>
  <?php require_once('../const/cms_scripts.php'); ?>
</head>
<body>
	<div class="sign section--full-bg" data-bg="img/<?php echo AppAuthBG; ?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content" >
						<form id="app_frmc2" action="core/reset_pw" method="POST" autocomplete="OFF" class="sign__form">

							<a href="./" class="sign__logo">
								<img src="img/logo-login.png" style="width=100%; height: 100px" />
							</a>
              <p class="text_white">Change your login password.</p>
							<?php require_once('../const/check_reply.php'); ?>


              <div class="sign__group">
                <input disabled readonly  type="text" class="sign__input" value="<?php echo $email; ?>">
              </div>

							<div class="sign__group">
								<input id="newpass" name="password" type="password" class="sign__input" placeholder="Enter new password">
							</div>

              <div class="sign__group">
                <input id="confirmpass" name="confirmpassword"  type="password" class="sign__input" placeholder="Confirm new password">
              </div>

							<button type="submit" name="submit" value="1" class="sign__btn" type="button">Change Password</button>



						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/slider-radio.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/smooth-scrollbar.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/main.js"></script>
  <script src="plugins/loader/waitMe.js"></script>
  <script src="js/forms.js"></script>

</body>

</html>
