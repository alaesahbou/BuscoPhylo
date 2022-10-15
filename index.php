<?php
session_start();

$cmd = escapeshellcmd('cd '.dirname(__DIR__).'/admin/core/ && sudo php '.dirname(__DIR__).'/admin/core/busco.php');
$dest = '/out.txt';
popen("$cmd > $dest 2>&1 &", 'r');

error_reporting(0);
ini_set('display_errors', 0);
require_once('nohup.php');

if(file_exists('db/config.php')){
require_once('db/config.php');
} else {
header("location:db/install.php");
}
require_once('const/web-info.php');
require_once('const/check_session.php');
require_once('const/my_profile.php');
switch($res) {
	
	case '1':
	$logged = "1";
	break;
}



if (!file_exists("results.json")) {
    $fp = fopen('results.json', 'w');
    fwrite($fp, json_encode($response));
    fclose($fp);
}
$json = file_get_contents('results.json');
 $data = json_decode($json,true);
  if (!empty($data["posts"][0]["output"])) {
    $output = $data["posts"][0]["output"];
  } else { $output = 'Done'; }
  if ($output=='Done') {
  try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_items WHERE run_time='Waiting list' ORDER BY c_id LIMIT 1");
$stmt->execute();
$result = $stmt->fetchAll();
if (count($result) < 1) {
  
} else {
$response = array();
$posts = array();
foreach($result as $row)
{
$st1 = preg_replace("/[^a-zA-Z]/", " ", $row[1]);
$st2 =  preg_replace('/\s+/', ' ', $st1);
$item_title = strtolower(str_replace(' ', '-', $st2));

$title = $row[1];
$description = $row[3];
$age = $row[7];
$type = "f*";
$genres = $row[9];
$email = $row[17];
$outgroup = $row[15];

if ($rates < 10) {
  $rates = ''.$rates.'.0';
}
$posts[] = array('ID'=> $row[2], 'name'=> $title, 'lineage'=> $age, 'outgroup'=> $outgroup, 'mode'=> $genres, 'input'=> $description, 'output'=> 'Running', 'type'=> $type, 'email'=> $email);

$stmt = $conn->prepare("UPDATE tbl_items SET run_time='Running' WHERE item_id = ?");
$stmt->execute([$row[2]]);

}
$response['posts'] = $posts;

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

}
$stmt = $conn->prepare("SELECT * FROM tbl_items");
$stmt->execute();
$result = $stmt->fetchAll();
/*foreach($result as $row){
if(!file_exists(exec('pwd').'/'.$row[3])){
    $stmt = $conn->prepare("DELETE FROM tbl_items WHERE item_id=?");
    $stmt->execute([$row[2]]);
}
}*/
}catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_items WHERE date < NOW() - INTERVAL 7 DAY");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $row){
    $stmt = $conn->prepare("DELETE FROM tbl_items WHERE item_id=?");
    $stmt->execute([$row[2]]);
}
}catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
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
	<title><?php echo AppName; ?> – Home</title>
  <?php require_once('const/cms_scripts.php'); 
  try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$about = "";
$tagline = "";
$cp = "";
$acc = "";
$en = "";

$stmt = $conn->prepare("SELECT * FROM tbl_about LIMIT 1");
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row)
{
  $about = $row[1];
  $tagline = $row[2];
  $cp = $row[3];
  $acc = $row[4];
  $en = $row[5];
}
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
?>
<style>
    @media only screen and (min-width: 1200px) {
  .nobr { white-space: nowrap }
}
</style>
</head>

<body>

	<?php// require_once('const/draws/header.php'); ?>
	<header class="header header--static">
    <center><div style="background-color: #E28413;color: white;" ><h4><span style="color: #000022;">News!! </span>The paper of BuscoPhylo is published on Scientific report</h4></div></center>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="header__content">
          <button class="header__menu" type="button">
            <span></span>
            <span></span>
            <span></span>
          </button>
<style>
@media only screen and (max-width: 900px) {
    #headerlogo{
        height: 100%;
        width: 110%;
    }
}
@media only screen and (min-width: 900px) {
    #headerlogo{
        height: 100%;
        width: 150%;
    }
}
</style>
          <a href="<?php echo $dir; ?>" class="header__logo">
              <?php echo AppLogo; ?>
          </a>

          <ul class="header__nav">

            <li class="header__nav-item">
              <a class="header__nav-link" href="<?php echo $dir; ?>" role="button">Home</a>
            </li>
            <li class="header__nav-item">
              <a class="header__nav-link" href="<?php echo $dir; ?>project">Create Project</a>
            </li>
            <li class="header__nav-item">
              <a class="header__nav-link" href="<?php echo $dir; ?>documentation">Documentation</a>
            </li>
            <li class="header__nav-item">
              <a class="header__nav-link" href="<?php echo $dir; ?>contact">Contact</a>
            </li>


          </ul>

          <div class="header__actions">
            <form autocomplete="OFF" method="GET" action="<?php echo $dir; ?>search_catalog" class="header__form">
              <input class="header__form-input" name="keywords" type="text" placeholder="Your Job Id" required>
              <button type="submit" class="header__form-btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/></svg></button>
              <button  class="header__form-close"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.3345 0.000183105H5.66549C2.26791 0.000183105 0.000488281 2.43278 0.000488281 5.91618V14.0842C0.000488281 17.5709 2.26186 20.0002 5.66549 20.0002H14.3335C17.7381 20.0002 20.0005 17.5709 20.0005 14.0842V5.91618C20.0005 2.42969 17.7383 0.000183105 14.3345 0.000183105ZM5.66549 1.50018H14.3345C16.885 1.50018 18.5005 3.23515 18.5005 5.91618V14.0842C18.5005 16.7653 16.8849 18.5002 14.3335 18.5002H5.66549C3.11525 18.5002 1.50049 16.7655 1.50049 14.0842V5.91618C1.50049 3.23856 3.12083 1.50018 5.66549 1.50018ZM7.07071 7.0624C7.33701 6.79616 7.75367 6.772 8.04726 6.98988L8.13137 7.06251L9.99909 8.93062L11.8652 7.06455C12.1581 6.77166 12.6329 6.77166 12.9258 7.06455C13.1921 7.33082 13.2163 7.74748 12.9984 8.04109L12.9258 8.12521L11.0596 9.99139L12.9274 11.8595C13.2202 12.1524 13.2202 12.6273 12.9273 12.9202C12.661 13.1864 12.2443 13.2106 11.9507 12.9927L11.8666 12.9201L9.99898 11.052L8.13382 12.9172C7.84093 13.2101 7.36605 13.2101 7.07316 12.9172C6.80689 12.6509 6.78269 12.2343 7.00054 11.9407L7.07316 11.8566L8.93843 9.99128L7.0706 8.12306C6.77774 7.83013 6.77779 7.35526 7.07071 7.0624Z"/></svg></button>
            </form>
            
            <?php
            if ($logged == "1") {
            ?>
            <a href="<?php echo $dir; ?><?php echo $role; ?>" class="header__user">
              <span>My Account</span>
              <i class="auth_icon feather icon-user" style="color: orange;"></i>
            </a>
            <?php
            }else{
              ?>
              <a href="<?php echo $dir; ?>login" class="header__user">
                <span>Sign In</span>
              <i class="auth_icon feather icon-log-in" style="color: orange;"></i>
              </a>
              <?php
            }
            ?>


          </div>
        </div>
      </div>
    </div>
  </div>
</header>
	<section class="section section--head section--head-fixed">
		<div class="container">
			<div class="row">
				<div class="col-12 col-xl-6">
					<h1 class="section__title section__title--head nobr" ><?php echo AppName; ?></h1>
				</div>

				
			</div>
		</div>
	</section>
		<section class="section section--pb0">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="section__text section__text--small"><?php echo $about; ?></p>
					<a class="categories__item" href="project.php" style="color: white;" >Submit Project</a>
				</div>

			</div>

			
		</div>
	</section>
	<?php require_once('const/draws/footer.php'); ?>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="plugins/loader/waitMe.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/slider-radio.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/smooth-scrollbar.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/home_catalog.js"></script>
</body>

</html>
