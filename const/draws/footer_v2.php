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
          <img src="../../img/logo-4.png" id="logo" style="height:100px;" />
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-1 order-md-2 order-lg-1 order-xl-2 offset-md-2 offset-lg-0 offset-xl-1" id="info">
        <h6 class="footer__title"><?php echo AppName; ?></h6>
        <div class="footer__nav">
          <a href="<?php echo $dir; ?>project.php">Create Project</a>
          <a href="<?php echo $dir;?>contact">Contact Us</a>
        </div>
      </div>

     
      <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-2 order-lg-3 order-md-4 order-xl-4">
        <h6 class="footer__title">About</h6>
        <div class="footer__nav">
          <a href="<?php echo $dir;?>Citation">Citation</a>
          <a href="<?php echo $dir;?>documentation">Documentation</a>
        </div>
      </div>
      
      <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-2 order-lg-3 order-md-4 order-xl-4">
        <div class="footer__flixtv">
          <figure><center><img src="../../img/logo.png" id="inra" /></center></figure>
        </div>
      </div>
      
       <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-2 order-lg-3 order-md-4 order-xl-4" id="adr">
        <h6 class="footer__title nobr">Institut National de la Recherche Agronomique, CRRA-Rabat</h6>
        <div class="footer__nav">
          <a href="<?php echo $dir;?>privacy"><span class="nobr">Unité de Recherche en biotechnologie</span> <span class="nobr">Av. Mohamed Belarbi Alaoui</span> <span class="nobr">BP. 6356, Rabat-Instituts 10101, Rabat, Morocco</span></a>
        </div>
      </div>
    </div>
  </div>
</footer>
