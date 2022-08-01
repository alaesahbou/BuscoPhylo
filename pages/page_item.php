<?php
session_start();
require_once('../db/config.php');
require_once('../const/web-info.php');
require_once('../const/check_session.php');
require_once('../const/single_item.php');
$dir = "../../";

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
$dlink = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="../../css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="../../css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../../css/slider-radio.css">
	<link rel="stylesheet" href="../../css/select2.min.css">
	<link rel="stylesheet" href="../../css/magnific-popup.css">
	<link rel="stylesheet" href="../../css/plyr.css">
	<link rel="stylesheet" href="../../css/main.css">
	<link type="text/css" rel="stylesheet" href="../../plugins/loader/waitMe.css">
	<link rel="icon" href="../../icon/<?php echo AppIcon; ?>" sizes="32x32">
	<meta name="description" content="<?php echo AppDesc; ?>">
	<meta name="keywords" content="<?php echo AppKeywords; ?>">
	<meta name="author" content="Bwire Mashauri">
	<script src="https://kit.fontawesome.com/d4e23f03c3.js" crossorigin="anonymous"></script>
	<title><?php echo AppName; ?> – <?php echo $title; ?></title>
  <?php require_once('../const/cms_scripts.php'); ?>


</head>

<body style="background-color: #f6f6f6">

	<?php require_once('../const/draws/header_v2.php'); ?>
	<?php require_once('../const/draws/fna.php'); ?>
	<?php require_once('../const/draws/footer.php'); ?>

	<script src="../../js/jquery-3.5.1.min.js"></script>
	<script src="../../js/bootstrap.bundle.min.js"></script>
	<script src="../../js/owl.carousel.min.js"></script>
	<script src="../../js/slider-radio.js"></script>
	<script src="../../js/select2.min.js"></script>
	<script src="../../js/smooth-scrollbar.js"></script>
	<script src="../../js/jquery.magnific-popup.min.js"></script>
	<script src="../../js/plyr.min.js"></script>
	<script src="../../js/main.js"></script>
	<script src="../../plugins/loader/waitMe.js"></script>
	<script src="../../js/forms.js"></script>
	<script src="../../js/single_item.js"></script>
	<?php require_once('../const/views_counter.php'); ?>
</body>

</html>