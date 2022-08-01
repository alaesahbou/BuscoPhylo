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

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $conn->prepare("SELECT * FROM tbl_privacy LIMIT 1");
$stmt->execute();
$result = $stmt->fetchAll();
$privacy = "";

foreach($result as $row)
{
  $privacy = $row[1];
}
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
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
  <link rel="icon" href="icon/<?php echo AppIcon; ?>" sizes="32x32">
	<meta name="description" content="<?php echo AppDesc; ?>">
	<meta name="keywords" content="<?php echo AppKeywords; ?>">
	<meta name="author" content="Bwire Mashauri">
	<title><?php echo AppName; ?> – Privacy Policy</title>
  <?php require_once('../const/cms_scripts.php'); ?>

</head>

<body>
	<?php require_once('../const/draws/header_v2.php'); ?>

	<section class="section section--head section--head-fixed">
		<div class="container">
			<div class="row">
				<div class="col-12 col-xl-6">
					<h1 class="section__title section__title--head"><?php echo AppName; ?> – Privacy Policy</h1>
				</div>

				<div class="col-12 col-xl-6">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="./">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Privacy</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="section section--pb0">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="section__text section__text--small"><?php echo $privacy; ?></p>

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
</body>

</html>
