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
$rpp = 18;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  if ($page=="" || $page=="1")
  {
  $page1 = 0;
  $page = 1;
  }else{
  $page1 = ($page*$rpp)-$rpp;
  }
  }else{
  $page1 = 0;
  $page = 1;
}
$current = $page1 + 1;

if ($page1 == "0") {
$start_pg = "1";
}else{
if ($page1 == "1") {
$start_pg = "1";
}else{
$start_pg = "1";
}
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
	<title><?php echo AppName; ?></title>
  <?php require_once('../const/cms_scripts.php'); ?>

</head>

<body>
	<?php require_once('../const/draws/header_v3.php'); ?>

	<section class="section section--head section--head-fixed">
		<div class="container">
			<div class="row">
				<div class="col-12 col-xl-6">
					<h1 class="section__title section__title--head">Browse Catalog</h1>
				</div>

				<div class="col-12 col-xl-6">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="./">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Catalog</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<div class="catalog catalog--page catalog--list">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<div class="row row--grid catalog_page">
            <?php
            $showing = $page1;

            try {
            $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM tbl_items WHERE status = 'Visible' ORDER BY c_id DESC LIMIT $page1,$rpp");
            $stmt->execute();
            $result = $stmt->fetchAll();
						if (count($result) < 1) {$current = 0;}

            foreach($result as $row)
            {
              $st1 = preg_replace("/[^a-zA-Z]/", " ", $row[1]);
              $st2 =  preg_replace('/\s+/', ' ', $st1);
              $item_title = strtolower(str_replace(' ', '-', $st2));
              $genr = (explode(",",$row[9]));
							$showing++;

$filecount = 0;
$files = glob($_SERVER["DOCUMENT_ROOT"]."/V2/admin/core/".$row[3]."*".$row[8]);
if ($files){
 $filecount = count($files);
}
$filecountout = 0;
$filesout = glob(dirname(__DIR__)."/admin/core/".$row[3]."tree.png");
if ($filesout){
 $filecountout = count($filesout);
} if($filecountout>0){$r=1;} 

              ?>
              <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="card">
                  <a href="item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>" class="card__cover">
                    <?php if($r==1){ ?><img class="movie_cover" src="admin/core/<?php echo $row[3]; ?>tree.png" alt=""><?php } else { ?><img class="movie_cover" src="uploads/cover/<?php echo $row[13]; ?>" alt=""><?php } ?>
                  </a>
                  <a href="item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>"></a>
                  <h3 title="<?php echo $row[1]; ?>" class="top_fix card__title"><a href="item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>"><?php echo $row[1]; ?></a></h3>
                  <ul class="card__list">
                    <li><?php echo $row[6]; ?></li>
                    <?php
                    $i = 0;
                    foreach( $genr as $el) {
                      if( $i >= 1) break;
                      ?><li><?php echo $el; ?></li><?php
                      $i++;
                    }
                    ?>
                    <li><?php echo $row[4]; ?></li>
                  </ul>
                </div>
              </div>

              <?php
            }
            }catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }

            ?>

					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="catalog__paginator-wrap">
						<span class="catalog__pages" id="showing">Showing 0 to 0 of 0</span>

						<ul class="catalog__paginator">

              <?php
              $add_query = "";
              $href = "";
              $rec = 0;
              try {
              $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $stmt = $conn->prepare("SELECT * FROM tbl_items WHERE status = 'Visible'");
              $stmt->execute();
              $result = $stmt->fetchAll();
              $rec = count($result);
              $total_pages = $rec /$rpp;
              $total_pages = ceil($total_pages);
              ?><script>document.getElementById('showing').innerHTML = "Showing <?php echo $current; ?> to <?php echo $showing; ?> of <?php echo number_format($rec); ?>";</script><?php

              $totalpage      = $total_pages;
              $currentpage    = (isset($_GET['page']) ? $_GET['page'] : 1);
              $firstpage      = 1;
              $lastpage       = $totalpage;
              $loopcounter = ( ( ( $currentpage + 2 ) <= $lastpage ) ? ( $currentpage + 2 ) : $lastpage );
              $startCounter =  ( ( ( $currentpage - 2 ) >= 3 ) ? ( $currentpage - 2 ) : 1 );
              $pagination = "";

              if($totalpage > 1) {
                $pagination .= '<li><a href="catalog'.$href.''.$add_query.'?page=1" id="1-page"><svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.75 5.36475L13.1992 5.36475" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.771 10.1271L0.749878 5.36496L5.771 0.602051" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a></li>';
                for($i = $startCounter; $i <= $loopcounter; $i++)
                {
                  if ($i == $page) {
                  $pagination .= '<li class="active"><a href="catalog'.$href.''.$add_query.'?page='.$i.'">'.$i.'</a></li>';
                  }else{
                  $pagination .= '<li><a href="catalog'.$href.''.$add_query.'?page='.$i.'">'.$i.'</a></li>';
                  }

                }
                $pagination .= '<li><a href="catalog'.$href.''.$add_query.'?page='.$totalpage.'" class="page-link" id="'.$totalpage.'-page"><svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1992 5.3645L0.75 5.3645" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.17822 0.602051L13.1993 5.36417L8.17822 10.1271" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a></li>';
              }

              }catch(PDOException $e)
              {
              echo "Connection failed: " . $e->getMessage();
              }
              echo $pagination;
              ?>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

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
