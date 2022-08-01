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

if (isset($_GET['key'])) {
  $category = $_GET['key'];
}else{
  header("location:../");
}

switch ($category) {
  case 'movies';
  $title = "Movies";
  $qu = "Movie";
  break;

  case 'tv-shows';
  $title = "TV Shows";
  $qu = "Show";
  break;

  default;
  header("location:../");
  break;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <base href="../">
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
	<title><?php echo AppName; ?> - <?php echo $title; ?></title>
  <?php require_once('../const/cms_scripts.php'); ?>

</head>

<body>
	<?php require_once('../const/draws/header_v3.php'); ?>

	<section class="section section--head section--head-fixed">
		<div class="container">
			<div class="row">
				<div class="col-12 col-xl-6">
					<h1 class="section__title section__title--head"><?php echo $title; ?></h1>
				</div>

				<div class="col-12 col-xl-6">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="./">Home</a></li>
            <li class="breadcrumb__item"><a href="./catalog">Catalog</a></li>
						<li class="breadcrumb__item breadcrumb__item--active"><?php echo $title; ?></li>
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

            $stmt = $conn->prepare("SELECT * FROM tbl_items WHERE status = 'Visible' AND upload_type = ? ORDER BY c_id DESC LIMIT $page1,$rpp");
            $stmt->execute([$qu]);
            $result = $stmt->fetchAll();
						if (count($result) < 1) {$current = 0;}

            foreach($result as $row)
            {
              $st1 = preg_replace("/[^a-zA-Z]/", " ", $row[1]);
              $st2 =  preg_replace('/\s+/', ' ', $st1);
              $item_title = strtolower(str_replace(' ', '-', $st2));
              $genr = (explode(",",$row[9]));
							$showing++;

              ?>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="card card--big">
                  <a href="item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>" class="card__cover">
                    <img class="movie_cover_category" src="uploads/cover/<?php echo $row[13]; ?>" alt="">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </a>
                    <a href="item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>"><button class="card__add" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"/></svg></button></a>
                  <span class="card__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $row[14]; ?></span>
                  <div class="card__content">
                    <h3 class="card__title top_fix"><a href="item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>"><?php echo $row[1]; ?></a></h3>
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
                    <ul class="card__info">
                      <li><span>Runtime:</span><span><?php echo $row[5]; ?></span></li>
                    </ul>
                    <p class="card__tagline top_fix_description"><?php echo $row[3]; ?></p>
                  </div>
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
              $add_query = $category;
              $href = "";
              $rec = 0;
              try {
              $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $stmt = $conn->prepare("SELECT * FROM tbl_items WHERE status = 'Visible' AND upload_type = ?");
              $stmt->execute([$qu]);
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
                $pagination .= '<li><a href="category/'.$href.''.$add_query.'?page=1" id="1-page"><svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.75 5.36475L13.1992 5.36475" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.771 10.1271L0.749878 5.36496L5.771 0.602051" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a></li>';
                for($i = $startCounter; $i <= $loopcounter; $i++)
                {
                  if ($i == $page) {
                  $pagination .= '<li class="active"><a href="category/'.$href.''.$add_query.'?page='.$i.'">'.$i.'</a></li>';
                  }else{
                  $pagination .= '<li><a href="category/'.$href.''.$add_query.'?page='.$i.'">'.$i.'</a></li>';
                  }

                }
                $pagination .= '<li><a href="category/'.$href.''.$add_query.'?page='.$totalpage.'" class="page-link" id="'.$totalpage.'-page"><svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1992 5.3645L0.75 5.3645" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.17822 0.602051L13.1993 5.36417L8.17822 10.1271" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a></li>';
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
