<?php
session_start();
require_once('db/config.php');
require_once('const/web-info.php');
require_once('const/check_session.php');
require_once('const/my_profile.php');
$item = $_SESSION['project'];
if(isset($_GET['q'])){
    $item = $_GET['q'];
}
 try {
              $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
              $stmt = $conn->prepare("SELECT * FROM tbl_items WHERE run_time = ?");
              $stmt->execute(['Waiting list']);
              $result = $stmt->fetchAll();
              $stmt2 = $conn->prepare("SELECT * FROM tbl_items WHERE item_id = ?");
              $stmt2->execute([$item]);
              $result2 = $stmt2->fetchAll();
foreach($result2 as $row2) {
    $title=$row2[1];
}
              foreach($result as $row) {
                  if(!isset($i)){$i=0;}
                  if($row[2]==$item){$count=$i;}
                  $i++;
              }
              if(isset($count)){
                  
              } else {
                  $count = 0;
              }
              if($count==0){
                  
$json = file_get_contents('results.json');
 $data = json_decode($json,true);
  if (!empty($data["posts"][0]["output"])) {
    $output = $data["posts"][0]["output"];
    $output_id = $data["posts"][0]["ID"];
  } else { $output = 'Done'; }
  if ($output=='Done') {
                  ?> <meta http-equiv="refresh" content="4; URL=item/<?php echo $item.'/'.$title; ?>"><?php
  } else {
      if ($output_id != $item) {
      $count = $count + 1;
      } else {
          ?> <meta http-equiv="refresh" content="4; URL=item/<?php echo $item.'/'.$title; ?>"><?php
      }
  }
              }
 ?>
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
	<title><?php echo AppName; ?> – Process</title>
  <?php require_once('const/cms_scripts.php'); ?>

</head>

<body>
	<?php require_once('const/draws/header_v3.php'); ?>

	<section class="section section--head section--head-fixed">
		<div class="container">
			<div class="row">
				<div class="col-12 col-xl-6">
					<h1 class="section__title section__title--head">Your submission is processing!</h1>
				</div>

				<div class="col-12 col-xl-6">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="./">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Process</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="section section--head section--head-fixed">
			<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="section__text section__text--small"><?php 
	    foreach($result as $row) {$id=$row[2];}
              echo "Job ID: ".$id."<br>";
              echo "Please wait, you will be redirected when your results are ready. You can also bookmark this page and come back later to check the progress and view your results. Or check Remember Me to save this page and check the results later by clicking My Searches in the top right corner.<br></p>";
              ?> 

<a href="#" OnClick="window.external.AddFavorite(location.href+<?php echo "?q=".$item; ?>, document.title);">Ajouter aux favoris</a>
              <?php
              echo "<center><img src='img/loading.gif' /></center><br>";
              echo "<p>This project will be automatically removed after 7 days</p><br>";
              echo "<p>Status: ".($count)." submissions ahead of yours...<br>";
              
              }catch(PDOException $e)
              {
              echo "Connection failed: " . $e->getMessage();
              }
	?></p>

				</div>

			</div>

			
		</div>
	</section>

	

  <?php require_once('const/draws/footer.php'); ?>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/slider-radio.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/smooth-scrollbar.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/main.js"></script>
	<script>
	    setTimeout(function(){
   window.location.reload(1);
}, 5000);
	</script>
</body>

</html>