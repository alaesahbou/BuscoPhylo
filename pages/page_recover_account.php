<?php
session_start();
require_once('../db/config.php');
require_once('../const/web-info.php');
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
	<title><?php echo AppName; ?> – Recover Account</title>
  <?php require_once('../const/cms_scripts.php'); ?>
</head>
<body>
	<div class="sign section--full-bg" data-bg="img/<?php echo AppAuthBG; ?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content" >
						<form id="app_frm" action="core/reset_account" method="POST" autocomplete="OFF" class="sign__form">

							<a href="./" class="sign__logo">
								<img src="img/logo-login.png" style="width=100%; height: 100px" />
							</a>
              <p class="text_white">Recover Account</p>
							<?php require_once('../const/check_reply.php'); ?>


              <div class="sign__group">
								<input type="email" name="email" required class="sign__input" placeholder="Email">
							</div>
              <span class="sign__text">We will send instructions to your Email.</span>
              <?php
              if (isset($_GET['t'])) {
                $type = $_GET['t'];
                switch($type) {
                  case '1';
                  ?><input type="hidden" name="reset" value="1" ><?php
                  break;

                  case '2';
                  ?><input type="hidden" name="reset" value="2" ><?php
                  break;
                  
                  default;
                  header("location:./");
                  break;
                }
              }else{
                header("location:./");
              }
              ?>

							<button type="submit" name="submit" value="1" class="sign__btn" type="submit">Send</button>


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
