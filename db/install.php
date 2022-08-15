<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="../css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/slider-radio.css">
	<link rel="stylesheet" href="../css/select2.min.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">
	<link rel="stylesheet" href="../css/plyr.css">
	<link rel="stylesheet" href="../css/main.css">
	<link type="text/css" rel="stylesheet" href="../plugins/loader/waitMe.css">
	<link rel="icon" href="icon/logo.png" sizes="32x32">
	<meta name="description" content="BuscoPhylo">
	<meta name="keywords" content="BuscoPhylo">
	<meta name="author" content="Bwire Mashauri">
	<title>Install BuscoPhylo</title>
  <?php require_once('../const/cms_scripts.php'); ?>

</head>

<body>

	<header class="header header--static">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="header__content">
          <button class="header__menu" type="button">
            <span></span>
            <span></span>
            <span></span>
          </button>

          <a href="../" class="header__logo">
              <img src="../img/logo-1.png" style="height: 90px;" />
          </a>

          <ul class="header__nav">

            <li class="header__nav-item">
              <a class="header__nav-link" href="../" role="button">Home</a>
            </li>
            <li class="header__nav-item">
              <a class="header__nav-link" href="../project">Create Project</a>
            </li>
            <li class="header__nav-item">
              <a class="header__nav-link" href="../documentation">Documentation</a>
            </li>
            <li class="header__nav-item">
              <a class="header__nav-link" href="../contact">Contact</a>
            </li>


          </ul>

          <div class="header__actions">
            <form autocomplete="OFF" method="GET" action="../search_catalog" class="header__form">
              <input class="header__form-input" name="keywords" type="text" placeholder="Your Job Id" required>
              <button type="submit" class="header__form-btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/></svg></button>
              <button  class="header__form-close"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.3345 0.000183105H5.66549C2.26791 0.000183105 0.000488281 2.43278 0.000488281 5.91618V14.0842C0.000488281 17.5709 2.26186 20.0002 5.66549 20.0002H14.3335C17.7381 20.0002 20.0005 17.5709 20.0005 14.0842V5.91618C20.0005 2.42969 17.7383 0.000183105 14.3345 0.000183105ZM5.66549 1.50018H14.3345C16.885 1.50018 18.5005 3.23515 18.5005 5.91618V14.0842C18.5005 16.7653 16.8849 18.5002 14.3335 18.5002H5.66549C3.11525 18.5002 1.50049 16.7655 1.50049 14.0842V5.91618C1.50049 3.23856 3.12083 1.50018 5.66549 1.50018ZM7.07071 7.0624C7.33701 6.79616 7.75367 6.772 8.04726 6.98988L8.13137 7.06251L9.99909 8.93062L11.8652 7.06455C12.1581 6.77166 12.6329 6.77166 12.9258 7.06455C13.1921 7.33082 13.2163 7.74748 12.9984 8.04109L12.9258 8.12521L11.0596 9.99139L12.9274 11.8595C13.2202 12.1524 13.2202 12.6273 12.9273 12.9202C12.661 13.1864 12.2443 13.2106 11.9507 12.9927L11.8666 12.9201L9.99898 11.052L8.13382 12.9172C7.84093 13.2101 7.36605 13.2101 7.07316 12.9172C6.80689 12.6509 6.78269 12.2343 7.00054 11.9407L7.07316 11.8566L8.93843 9.99128L7.0706 8.12306C6.77774 7.83013 6.77779 7.35526 7.07071 7.0624Z"/></svg></button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</header>


        <style type="text/css">
         @media only screen and (min-width: 800px) {
             #add {
            width: 50%;
            margin-left: 25%;
            color: white;
          }
         }
          main input, main select {
            margin-bottom: 10px;
          }
          main .btn {
            width: 50%;
            margin-left: 25%;
          }
          <style>
    @media only screen and (max-width: 800px) {
  #add {
            width: 80%;
            margin-left: 10%;
            color: white;
}
</style>
        </style>

<div class="catalog">
  <div class="container">
    <div class="row" id="add">
      <div class="col-12">
          <div class="main__title">
            <h2 style="text-align: center;color:#131720;" id="project__add--title">Install BuscoPhylo</h2>
          </div>
        </div>

        <div class="col-12">
            <main class="main">
              <form id="app_frm_c" method="POST" autocomplete="OFF" class="form" enctype="multipart/form-data">
                
                <div class="form__group">
                      <input required name="Host" type="text" class="form__input txt-cap" placeholder="Host">
                </div>
                <div class="form__group">
                      <input required name="Username" type="text" class="form__input txt-cap" placeholder="Username">
                </div>
                <div class="form__group">
                      <input required name="Password" type="text" class="form__input txt-cap" placeholder="Password">
                </div>
                    </div>
                    <div class="form__group">
                      <input type="submit" name="submit" id="submit" value="Submit" class="btn form__input txt-cap" style="color: #fff;">
                    </div>
              </form>
            </main>

        <div class="row row--grid" id="movie_grid">



        </div>
      </div>
    </div>

  </div>
</div>

	<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-8 col-md-6 col-lg-4 col-xl-3 order-4 order-md-1 order-lg-4 order-xl-1">
          <style>
          @media only screen and (max-width: 1200px) {
  #logo {
                display: none;  
              }
              #inra{
                  width: 50%;
              }
}
@media only screen and (min-width: 1200px) {
  #inra {  
                margin-top: 5px;
                width: 100%;
              }
  #info {
                margin-left: -100px;  
              }
  #adr {
                
  }
  .nobr { white-space: nowrap }
}
          </style>
        <div class="footer__flixtv">
          <img src="../img/logo-4.png" id="logo" style="height:100px;" />
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-1 order-md-2 order-lg-1 order-xl-2 offset-md-2 offset-lg-0 offset-xl-1" id="info">
        <h6 class="footer__title">BuscoPhylo</h6>
        <div class="footer__nav">
          <a href="../project.php">Create Project</a>
          <a href="../contact">Contact Us</a>
        </div>
      </div>

     
      <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-2 order-lg-3 order-md-4 order-xl-4">
        <h6 class="footer__title">About</h6>
        <div class="footer__nav">
          <a href="../Citation">Citation</a>
          <a href="../documentation">Documentation</a>
        </div>
      </div>
      
      <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-2 order-lg-3 order-md-4 order-xl-4">
        <div class="footer__flixtv">
          <figure><center><img src="../img/logo.png" id="inra" /></center></figure>
        </div>
      </div>
      
       <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-2 order-lg-3 order-md-4 order-xl-4" id="adr">
        <h6 class="footer__title nobr">Institut National de la Recherche Agronomique, CRRA-Rabat</h6>
        <div class="footer__nav">
          <span class="nobr">Unité de Recherche en biotechnologie</span> <span class="nobr">Av. Mohamed Belarbi Alaoui</span> <span class="nobr">BP. 6356, Rabat-Instituts 10101, Rabat, Morocco</span>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php
$myfile = fopen("config.php", "w") or die("Unable to open file!");
$txt = "<?php\n
//Database Server Name:\n
DEFINE('DBHost','localhost');\n

//Database Username:\n
DEFINE('DBUser', 'root');\n

//Database Password:\n
DEFINE('DBPass','');\n

//Database Name:\n
DEFINE('DBName','busco_laravel');\n

//Character set:\n
DEFINE('DBCharset','utf8mb4');\n

//Database Collation:\n
DEFINE('DBCollation', 'utf8_general_ci');\n

//Database Prefix:\n
DEFINE('DBPrefix', '');\n
?>
";
fwrite($myfile, $txt);
fclose($myfile);

header("location:../");

?>


	<script src="../js/jquery-3.5.1.min.js"></script>
	<script src="../plugins/loader/waitMe.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/slider-radio.js"></script>
	<script src="../js/select2.min.js"></script>
	<script src="../js/smooth-scrollbar.js"></script>
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/plyr.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/home_catalog.js"></script>
</body>

</html>