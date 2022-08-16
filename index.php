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

	<?php require_once('const/draws/header.php'); ?>
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
