<section class="section section--head section--head-fixed section--gradient section--details-bg">
  <div class="section__bg" data-bg="../../img/<?php echo AppItemDetail; ?>"></div>
  <div class="container">

    <div class="article">
      <div class="row">
        <div class="col-12 col-xl-8">
          <?php
          if ($trailer == "") {

          }else{
          ?>
          <a href="<?php echo $trailer; ?>" class="article__trailer open-video">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            Trailer
          </a>
          <?php
          }
          ?>

          <div class="article__content">
            <h1><?php echo $title ;?></h1>

            <ul class="list">
              <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $rates; ?></li>
              <li>
                <?php
                $tgen = count($genres);
                $st_g = 0;
                foreach($genres as $el) {
                  ?><?php echo $el; ?><?php
                  $st_g++;
                  if ($st_g == $tgen) {

                  }else{
                    print ', ';
                  }
                }
                ?>
              </li>
              <li><?php echo $year; ?></li>
              <li><?php echo $run_time; ?></li>
              <li><?php echo $age; ?></li>
            </ul>

            <p><?php echo $description; ?></p>
          </div>

        </div>

        <?php
        if ($logged == "1") {
          $prev_auth = "1";
        }else{
        if (AppGuest == "1") {
          $prev_auth = "1";
        }else{
          $prev_auth = "0";
        }
        }
        function auth_2() {
          foreach($GLOBALS as $k => $v) {
             $$k=&$GLOBALS[$k];
          }
          if ($plan == "Free") {
            global $streaming;
            global $max_vid_size;
            $streaming = "1";
            $max_vid_size = 1080;
          }else{
            global $streaming;
            global $reason;
            global $max_vid_size;
            $streaming = "0";
            $_SESSION['rs'] = "Not available in Free plan, upgrade your plan now";

            if ($logged == "1") {
              try {
              $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            	$stmt = $conn->prepare("SELECT * FROM tbl_user_plans WHERE user = ?");
            	$stmt->execute([$user_id]);
            	$result = $stmt->fetchAll();

              foreach($result as $row) {
              $expire__date = $row[4];
              $max_vid_size = $row[5];

              if (new DateTime() > new DateTime($expire__date)) {

              } else {
              $streaming = "1";
              }

              }
            	}catch(PDOException $e)
              {
              echo "Connection failed: " . $e->getMessage();
              }
            }



          }
        }

        if ($prev_auth == "1") {

        if ($logged == "1") {
          if ($role == "admin") {
            $streaming = "1";
            $max_vid_size = 1080;
          }else{
            auth_2();
          }
        }else{
          auth_2();
        }



        }else{
          $streaming = "0";
          $_SESSION['rs'] = "You must be a registered user";
        }

        ?>

        <div class="col-12 col-xl-8">
          <?php
          if ($GLOBALS['streaming'] == "1") {

          }else{
          ?><p style="margin-top:20px;" class="text_white"><?php echo $_SESSION['rs']; ?></p><?php
          }
          ?>
          <div class="article__actions article__actions--details">
            <div class="article__download">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z"/></svg>
              Download Links :
              <?php
              if ($GLOBALS['streaming'] == "1") {
                ?><a href="#modal-links" class="open-modal">Movie Links</a>
                  <a href="#subs-links" class="open-modal">Subtitle Links</a>

                <div id="modal-links" class="zoom-anim-dialog mfp-hide modal">
                  <table class="main__table main__table--dash">
                  								<thead>
                  									<tr>
                  										<th>SIZE</th>
                  										<th>DOWNLOAD LINK</th>
                  									</tr>
                  								</thead>
                  								<tbody>
                                    <?php
                                      try {
                                      $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
                                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                      $stmt = $conn->prepare("SELECT * FROM tbl_single_links WHERE item = ? ORDER BY size");
                                      $stmt->execute([$item_id]);
                                      $result = $stmt->fetchAll();

                                      foreach($result as $row)
                                      {
                                        ?>
                                        <tr>
                                          <td>
                                            <div class="main__table-text"><?php echo $row[3]; ?>p</div>
                                          </td>
                                          <?php
                                          if ($row[3] <= $max_vid_size) {
                                          ?>
                                          <td>
										                      <div class="main__table-text main__table-text--green"><a href="<?php echo $row[2]; ?>" download><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z"/></svg> Download Now</a></div>
                                          </td>
                                          <?php
                                          }else{
                                          ?>
                                          <td>
                                          <div class="main__table-text main__table-text--red"><a href="../../pricing">Not available in your plan</a></div>
                                          </td>
                                          <?php
                                          }
                                          ?>

                                        </tr>
                                        <?php
                                      }

                                      }catch(PDOException $e)
                                      {
                                      echo "Connection failed: " . $e->getMessage();
                                      }
                                    ?>


                  								</tbody>
                  							</table>
                </div>


                <div id="subs-links" class="zoom-anim-dialog mfp-hide modal">
                  <table class="main__table main__table--dash">
                                  <thead>
                                    <tr>
                                      <th>LANGUAGE</th>
                                      <th>DOWNLOAD LINK</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      try {
                                      $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
                                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                      $stmt = $conn->prepare("SELECT * FROM tbl_single_subs WHERE item = ? ORDER BY language");
                                      $stmt->execute([$item_id]);
                                      $result = $stmt->fetchAll();

                                      foreach($result as $row)
                                      {
                                        ?>
                                        <tr>
                                          <td>
                                            <div class="main__table-text"><?php echo $row[3]; ?> (<?php echo strtoupper($row[4]); ?>)</div>
                                          </td>
                                          <td>
                                          <div class="main__table-text main__table-text--green"><a href="<?php echo $row[2]; ?>" download><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z"/></svg> Download Sub</a></div>
                                          </td>

                                        </tr>
                                        <?php
                                      }

                                      }catch(PDOException $e)
                                      {
                                      echo "Connection failed: " . $e->getMessage();
                                      }
                                    ?>


                                  </tbody>
                                </table>
                </div>

                <?php
              }else{
                ?><a><?php echo $_SESSION['rs']; ?></a><?php
              }
              ?>
            </div>
            <?php
            if ($logged == "1") {
            if ($role == "user") {

              try {
                $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT * FROM tbl_favourites WHERE item = ? AND user = ?");
                $stmt->execute([$item_id, $user_id]);
                $result = $stmt->fetchAll();
                if (count($result) < 1) {
                ?><b id="wait"><button id="<?php echo $item_id; ?>" onclick="add_fav(this.id);" class="article__favorites" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"></path></svg> Add to favorites</button></b><?php
              }else{
                ?><button class='article__favorites' type='button'>Added to favorites</button><?php
              }
                }catch(PDOException $e)
                {
                echo "Connection failed: " . $e->getMessage();
                }

            }else{

            }
            }else{
            ?><a href="../../login?red=<?php echo $dlink; ?>" class="article__favorites" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"></path></svg> Add to favorites</a><?php
            }
            ?>

          </div>
        </div>



        <div class="col-12 col-xl-8">
          <div class="categories">
            <h3 class="categories__title">Genres</h3>
            <?php
            foreach($genres as $el) {
            ?><a href="../../genre/<?php echo strtolower($el); ?>" class="categories__item"><?php echo $el; ?></a><?php
            }
            ?>
          </div>

          <div class="share">
            <h3 class="share__title">Share</h3>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $dlink; ?>" class="share__link share__link--fb"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.56341 16.8197V8.65888H7.81615L8.11468 5.84663H5.56341L5.56724 4.43907C5.56724 3.70559 5.63693 3.31257 6.69042 3.31257H8.09873V0.5H5.84568C3.1394 0.5 2.18686 1.86425 2.18686 4.15848V5.84695H0.499939V8.6592H2.18686V16.8197H5.56341Z"/></svg> share</a>
            <a href="https://twitter.com/home?status=<?php echo $dlink; ?>" class="share__link share__link--tw"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.55075 3.19219L7.58223 3.71122L7.05762 3.64767C5.14804 3.40404 3.47978 2.57782 2.06334 1.1902L1.37085 0.501686L1.19248 1.01013C0.814766 2.14353 1.05609 3.34048 1.843 4.14552C2.26269 4.5904 2.16826 4.65396 1.4443 4.38914C1.19248 4.3044 0.972149 4.24085 0.951164 4.27263C0.877719 4.34677 1.12953 5.31069 1.32888 5.69202C1.60168 6.22165 2.15777 6.74068 2.76631 7.04787L3.28043 7.2915L2.67188 7.30209C2.08432 7.30209 2.06334 7.31268 2.12629 7.53512C2.33613 8.22364 3.16502 8.95452 4.08833 9.2723L4.73884 9.49474L4.17227 9.8337C3.33289 10.321 2.34663 10.5964 1.36036 10.6175C0.888211 10.6281 0.5 10.6705 0.5 10.7023C0.5 10.8082 1.78005 11.4014 2.52499 11.6344C4.75983 12.3229 7.41435 12.0264 9.40787 10.8506C10.8243 10.0138 12.2408 8.35075 12.9018 6.74068C13.2585 5.88269 13.6152 4.315 13.6152 3.56293C13.6152 3.07567 13.6467 3.01212 14.2343 2.42953C14.5805 2.09056 14.9058 1.71983 14.9687 1.6139C15.0737 1.41264 15.0632 1.41264 14.5281 1.59272C13.6362 1.91049 13.5103 1.86812 13.951 1.39146C14.2762 1.0525 14.6645 0.438131 14.6645 0.258058C14.6645 0.22628 14.5071 0.279243 14.3287 0.374576C14.1398 0.480501 13.7202 0.639389 13.4054 0.734722L12.8388 0.914795L12.3247 0.565241C12.0414 0.374576 11.6427 0.162725 11.4329 0.0991699C10.8978 -0.0491255 10.0794 -0.0279404 9.59673 0.14154C8.2852 0.618204 7.45632 1.84694 7.55075 3.19219Z"/></svg> tweet</a>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-xl-12">

          <div class="comments">

            <ul class="nav nav-tabs comments__title comments__title--tabs" id="comments__tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                  <h4>Comments</h4>
                  <span id="comments">0</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">
                  <h4>Reviews</h4>
                  <span id="reviews">0</span>
                </a>
              </li>
            </ul>

            <div class="tab-content">

              <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                <ul class="comments__list">

                  <?php
                  try {
                  $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $stmt = $conn->prepare("SELECT * FROM tbl_comments WHERE item = ?");
                  $stmt->execute([$item_id]);
                  $result = $stmt->fetchAll();
                  $postCount = count($result);
                  ?>
                  <script>
                  document.getElementById('comments').innerHTML = '<?php echo number_format($postCount);?>';
                  </script>
                  <?php

                  if ($postCount > 0) {
                    $pages = ($postCount/1);
                  }else{
                    $pages = 0;
                  }
                  $limit = 12;

                  $stmt = $conn->prepare("SELECT * FROM tbl_comments LEFT JOIN tbl_users ON tbl_comments.user = tbl_users.id WHERE tbl_comments.item = ? ORDER BY tbl_comments.id DESC LIMIT 0,$limit");
                  $stmt->execute([$item_id]);
                  $result = $stmt->fetchAll();

                  foreach($result as $row)
                  {
                    $comm_date = $row[3];
                    $old_date_timestamp = strtotime($comm_date);
                    $new_date = date('d M, Y h:i:s', $old_date_timestamp);

                    ?>
                    <li class="comments__item">
                      <div class="comments__autor">
                        <img class="comments__avatar" src="../../img/users/<?php echo $row[15]; ?>">
                        <span class="comments__name"><?php echo $row[11]; ?> <?php if ($row[17] == "1") {print '<img id="verified" title="Verified Account" class="verification" src="../../img/check.svg">';} ?></span>
                        <span class="comments__time"><?php echo $new_date; ?></span>
                      </div>
                      <p class="comments__text"><?php echo $row[4]; ?></p>

                    </li>
                    <?php
                  }
                  }catch(PDOException $e)
                  {
                  echo "Connection failed: " . $e->getMessage();
                  }
                  ?>



                </ul>

                <div class="row">
                  <div class="col-12" id="load_area" style="margin:auto">
                    <?php if ($pages > 12) {
                    ?><button id="loadBtn" class="catalog__more weeee" >Load more</button><?php
                    }?>

                  </div>
                  <input type="hidden" id="row" value="0">
                  <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
                </div>
                <?php
                if ($logged == "1") {
                ?>
                <form method="POST" id="app_frm" autocomplete="OFF" action="../../core/send_comment" class="comments__form">
                  <div class="sign__group">
                    <textarea id="text" name="comment" required class="sign__textarea" placeholder="Add comment"></textarea>
                  </div>
                  <input type="hidden" name="red" value="<?php echo $dlink; ?>">
                  <input type="hidden" name="item" value="<?php echo $item_id; ?>">
                  <button name="submit" value="1" type="submit" class="sign__btn">Send</button>
                </form>
                <?php
                }else{

                ?><p class="text_white">Please <a href="../../login?red=<?php echo $dlink; ?>">Login</a> to comment</p><?php
                }
                ?>

              </div>

              <div class="tab-pane fade" id="tab-2" role="tabpanel">
                <ul class="reviews__list">

                  <?php
                  try {
                  $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $stmt = $conn->prepare("SELECT * FROM tbl_reviews WHERE item = ?");
                  $stmt->execute([$item_id]);
                  $result = $stmt->fetchAll();
                  $postCountb = count($result);
                  ?>
                  <script>
                  document.getElementById('reviews').innerHTML = '<?php echo number_format($postCountb);?>';
                  </script>
                  <?php

                  if ($postCountb > 0) {
                    $pagesb = ($postCountb/1);
                  }else{
                    $pagesb = 0;
                  }
                  $limitb = 12;

                  $stmt = $conn->prepare("SELECT * FROM tbl_reviews LEFT JOIN tbl_users ON tbl_reviews.user = tbl_users.id WHERE tbl_reviews.item = ? ORDER BY tbl_reviews.id DESC LIMIT 0,$limitb");
                  $stmt->execute([$item_id]);
                  $result = $stmt->fetchAll();

                  foreach($result as $row)
                  {
                    if ($row[11] == "") {
                      $comm_date = $row[4];
                      $old_date_timestamp = strtotime($comm_date);
                      $new_date = date('d M, Y h:i:s', $old_date_timestamp);
                      if ($row[5] < 10) {
                      $rates = ''.$row[5].'.0';
                      }else{
                      $rates = $row[5];
                      }

                      ?>
                      <li class="reviews__item">
                        <div class="reviews__autor">
                          <img class="reviews__avatar" src="../../img/users/user.svg" alt="">
                          <span class="reviews__name"><?php echo $row[3]; ?></span>
                          <span class="reviews__time"><?php echo $new_date; ?> by Deleted User</span>
                          <span class="reviews__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $rates; ?></span>
                        </div>
                        <p class="reviews__text"><?php echo $row[6]; ?></p>
                      </li>
                      <?php
                    }else{
                      $comm_date = $row[4];
                      $old_date_timestamp = strtotime($comm_date);
                      $new_date = date('d M, Y h:i:s', $old_date_timestamp);
                      if ($row[5] < 10) {
                      $rates = ''.$row[5].'.0';
                      }else{
                      $rates = $row[5];
                      }

                      ?>
                      <li class="reviews__item">
                        <div class="reviews__autor">
                          <img class="reviews__avatar" src="../../img/users/<?php echo $row[15]; ?>" alt="">
                          <span class="reviews__name"><?php echo $row[3]; ?></span>
                          <span class="reviews__time"><?php echo $new_date; ?> by <?php echo $row[11]; ?> <?php if ($row[17] == "1") {print '<img id="verified" title="Verified Account" class="verification_small" src="../../img/check.svg">';} ?></span>
                          <span class="reviews__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $rates; ?></span>
                        </div>
                        <p class="reviews__text"><?php echo $row[6]; ?></p>
                      </li>
                      <?php
                    }

                  }
                  }catch(PDOException $e)
                  {
                  echo "Connection failed: " . $e->getMessage();
                  }
                  ?>



                </ul>

                <div class="row">
                  <div class="col-12" id="load_areab" style="margin:auto">
                    <?php if ($pagesb > 12) {
                    ?><button id="loadBtnb" class="catalog__more weeee" >Load more</button><?php
                    }?>

                  </div>
                  <input type="hidden" id="rowb" value="0">
                  <input type="hidden" id="postCountb" value="<?php echo $postCount; ?>">
                </div>

                <?php
                if ($logged == "1") {
                  try {
                  $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $stmt = $conn->prepare("SELECT * FROM tbl_reviews WHERE item = ? AND user = ?");
                  $stmt->execute([$item_id, $user_id]);
                	$result = $stmt->fetchAll();

                  if (count($result) > 0) {
                  ?><p class="text_white">You left a review on this item:</p><?php
                  }else{
                  ?>
                  <form method="POST" id="app_frm4" autocomplete="OFF" action="../../core/send_review"  class="reviews__form">
                    <div class="row">
                      <div class="col-12 col-md-9 col-lg-10 col-xl-9">
                        <div class="sign__group">
                          <input type="text" name="title" required class="sign__input txt-cap" placeholder="Title">
                        </div>
                      </div>

                      <div class="col-12 col-md-3 col-lg-2 col-xl-3">
                        <div class="sign__group">
                          <select name="rating" required id="select" class="sign__select">
                            <option value="">Rating</option>
                            <option value="10">10</option>
                            <option value="9">9</option>
                            <option value="8">8</option>
                            <option value="7">7</option>
                            <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="sign__group">
                          <textarea id="text2" name="review" required class="sign__textarea" placeholder="Add review"></textarea>
                        </div>
                      </div>

                      <div class="col-12">
                        <input type="hidden" name="red" value="<?php echo $dlink; ?>">
                        <input type="hidden" name="item" value="<?php echo $item_id; ?>">
                        <button name="submit" value="1" type="submit" class="sign__btn">Send</button>
                      </div>
                    </div>
                  </form>
                  <?php
                  }

              	  }catch(PDOException $e)
                  {
                  echo "Connection failed: " . $e->getMessage();
                  }
                ?>

                <?php
                }else{

                ?><p class="text_white">Please <a href="../../login?red=<?php echo $dlink; ?>">Login</a> to review</p><?php
                }
                ?>



              </div>

            </div>

          </div>

        </div>

      </div>
    </div>

  </div>
</section>
