<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section__title">Select Your Plan</h2>
        <p class="section__text">No hidden fees, equipment rentals, or installation appointments.</p>
      </div>
    </div>

    <div class="row">

      <?php
      try {
      $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare("SELECT * FROM tbl_plans ORDER BY id LIMIT 3");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach($result as $row)
        {
          switch($row[4]) {
            case 'Days';
            if ($row[2] > 1) { $valid = ''.$row[2].' Days';}else{$valid = ''.$row[2].' Day';}
            break;

            case 'Months';
            if ($row[2] > 1) { $valid = ''.$row[2].' Months';}else{$valid = ''.$row[2].' Month';}
            break;

            case 'Years';
            if ($row[2] > 1) { $valid = ''.$row[2].' Years';}else{$valid = ''.$row[2].' Year';}
            break;

          }
          ?>
          <div class="col-12 col-md-6 col-xl-4 order-md-2 order-xl-1">
            <div class="plan">
              <h3 class="plan__title"><?php echo strtoupper($row[1]); ?></h3>
              <ul class="plan__list">
                <li class="green"><svg width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.43994 6.95981L6.77477 12.2924L17.4399 1.62723" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Unlimited Movies / TV Shows Download</li>
                <li class="green"><svg width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.43994 6.95981L6.77477 12.2924L17.4399 1.62723" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Unlimited Streaming Library</li>
                <li class="green"><svg width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.43994 6.95981L6.77477 12.2924L17.4399 1.62723" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Switch Plans Anytime</li>
                <?php
                if ($row[5] < 720) {
                ?>
                <li class="red"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.596 1.59982L1.60938 17.5865" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.601 17.5961L1.60101 1.5928" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg> HD Movies / TV Shows</li>
                <?php
                }else{
                ?><li class="green"><svg width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.43994 6.95981L6.77477 12.2924L17.4399 1.62723" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> HD Movies / TV Shows</li><?php
                }
                ?>

                <?php
                if ($row[5] < 1080) {
                ?>
                <li class="red"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.596 1.59982L1.60938 17.5865" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.601 17.5961L1.60101 1.5928" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg> Full HD Movies / TV Shows</li>
                <?php
                }else{
                ?><li class="green"><svg width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.43994 6.95981L6.77477 12.2924L17.4399 1.62723" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Full HD Movies / TV Shows</li><?php
                }
                ?>
              </ul>
              <span class="plan__price"><?php if (AppCurrency == "") {}else{ print AppCurrency;} echo number_format($row[3],2); if (AppCurrency == "") {print ' '.strtoupper(AppISO).'';}else{}?><span> / <?php echo $valid; ?></span></span>
              <?php
              if ($logged == "1") {
              if ($role == "user") {
              ?>

                <a href="core/select_plan?node=<?php echo $row[0]; ?>" class="plans__btn abp">Select plan</a>

              <?php
              }else{
              $ext__link = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST']. explode('?', $_SERVER['REQUEST_URI'], 2)[0];
              $ext__link = str_replace("pricing","core/select_plan?node=$row[0]", $ext__link);
              ?>

                <a href="login?red=<?php echo $ext__link; ?>" class="plans__btn abp">Select plan</a>

              <?php
              }
              }else{
              $ext__link = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST']. explode('?', $_SERVER['REQUEST_URI'], 2)[0];
              $ext__link = str_replace("pricing","core/select_plan?node=$row[0]", $ext__link);
              ?>

                <a href="login?red=<?php echo $ext__link; ?>" class="plans__btn abp">Select plan</a>

              <?php
              }
              ?>

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
</section>
