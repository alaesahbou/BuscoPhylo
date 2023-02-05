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


          </ul>

          
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
              <form id="app_frm_c" method="POST" action="add_db.php" autocomplete="OFF" class="form" enctype="multipart/form-data">
                
                <div class="form__group">
                      <input required name="Host" type="text" class="form__input txt-cap" placeholder="Host">
                </div>
                <div class="form__group">
                      <input required name="Username" type="text" class="form__input txt-cap" placeholder="Username">
                </div>
                <div class="form__group">
                      <input  name="Password" type="text" class="form__input txt-cap" value="" placeholder="Password">
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
        
      </div>

     
      <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-2 order-lg-3 order-md-4 order-xl-4">
        
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
