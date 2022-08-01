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
	<title><?php echo AppName; ?> – Create Account</title>
  <?php require_once('../const/cms_scripts.php'); ?>
</head>
<body>
	<div class="sign section--full-bg" data-bg="img/<?php echo AppAuthBG; ?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content" >
						<form id="app_frm" action="core/new_member" method="POST" autocomplete="OFF" class="sign__form">

							<a href="./" class="sign__logo">
    							<img src="img/logo-login.png" style="width=100%; height: 100px" />
							</a>
							<p class="text_white">Create a free account. 🚀</p>
							<?php require_once('../const/check_reply.php'); ?>
							<div class="sign__group">
								<input name="fname" required type="text" class="sign__input txt-cap" placeholder="First Name">
							</div>

              <div class="sign__group">
                <input name="lname" required type="text" class="sign__input txt-cap" placeholder="Last Name">
              </div>

							<div class="sign__group">
								<input id="email" name="email" required type="email" class="sign__input" placeholder="Email Address">
                <m class="danger f-sm" id="email_response"></m>
							</div>

              <div class="sign__group">
                <input id="username" name="username" required type="text" class="sign__input" placeholder="Username">
                <m class="danger f-sm" id="username_response"></m>
              </div>

							<div class="sign__group">
								<input name="password" id="id-signup-password" required type="password" class="sign__input" placeholder="Password">
							</div>
              <?php
              if (isset($_GET['red'])) {
                ?><input type="hidden" name="redirect" value="<?php echo $_GET['red']; ?>" ><?php
              }else{
                ?><input type="hidden" name="redirect" value="none" ><?php
              }
              ?>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" required>
								<label for="remember">I agree to the <a href="privacy">Privacy Policy</a></label>
							</div>

							<button type="submit" name="submit" id="app_btnf" value="1" class="sign__btn" type="button">Create Account</button>

							<?php
							if (isset($_GET['red'])) {
								?><span class="sign__text">Already have an account? <a href="login?red=<?php echo $_GET['red']; ?>">Sign in!</a></span><?php
							}else{
								?><span class="sign__text">Already have an account? <a href="login">Sign in!</a></span><?php
							}
							?>




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
  <script src="js/registration.js"></script>

</body>

</html>
