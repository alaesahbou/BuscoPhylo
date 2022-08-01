<?php
session_start();
require_once('../db/config.php');
require_once('../const/web-info.php');
require_once('../const/check_session.php');
require_once('../const/temp_browse.php');

switch($res) {
	case '0':
	$logged = "0";
	break;

	case '1':
	$logged = "1";
	break;

	case '2':
	$logged = "0";
	break;

	case '3':
	$logged = "0";
	break;

}
$dir = "./";
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
	<title><?php echo AppName; ?> – Contact Us</title>
  <?php require_once('../const/cms_scripts.php'); ?>

</head>

<body>
	<?php require_once('../const/draws/header_v2.php'); ?>

	<section class="section section--head section--head-fixed">
		<div class="container">

		</div>
	</section>

	<section class="section section--pb0">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-7 col-xl-8 auto_contact">
          <div class="row">
            <div class="col-12 col-xl-6">
              <h1 class="section__title section__title--head">Contact Us</h1>
            </div>

            <div class="col-12 col-xl-6">
              <ul class="breadcrumb">
                <li class="breadcrumb__item"><a href="./">Home</a></li>
                <li class="breadcrumb__item breadcrumb__item--active">Contacts</li>
              </ul>
            </div>
          </div>
					<div  class="sign__form sign__form--contacts">
            <div id="callback"></div>
						<form method="POST" action="../admin/core/mail.php">
						    <div class="row" id="app_frm">
							<div class="col-12 col-xl-6">
								<div class="sign__group">
									<input type="text"  id="first-name" name="name"  class="sign__input txt-cap" placeholder="Name">
								</div>
							</div>

							<div class="col-12 col-xl-6">
								<div class="sign__group">
									<input type="email"  id="email" name="email" class="sign__input" placeholder="Email">
								</div>
							</div>

							<div class="col-12">
								<div class="sign__group">
									<input type="text" id="subject" name="subject" class="sign__input txt-cap" placeholder="Subject">
								</div>
							</div>

							<div class="col-12">
								<div class="sign__group">
									<textarea class="sign__textarea" id="message" name="message" placeholder="Type your message"></textarea>
								</div>
							</div>

							<div class="col-12 col-xl-3">
								<button id="send_button" type="button" class="sign__btn">Send Message</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php require_once('../const/draws/footer.php'); ?>

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
  <script src="js/contact.js"></script>
</body>


</html>
