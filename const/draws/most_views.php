<div class="home home--static">
  <div class="home__carousel owl-carousel" id="flixtv-hero">
    <?php
    try {
    $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  	$stmt = $conn->prepare("SELECT * FROM tbl_items WHERE status = 'Visible' ORDER BY views DESC LIMIT 10");
  	$stmt->execute();
  	$result = $stmt->fetchAll();

    foreach($result as $row)
    {
      $st1 = preg_replace("/[^a-zA-Z]/", " ", $row[1]);
      $st2 =  preg_replace('/\s+/', ' ', $st1);
      $item_title = strtolower(str_replace(' ', '-', $st2));
      $genr = (explode(",",$row[9]));

      ?>
      <div class="home__card">
        <a  title="<?php echo $row[1]; ?>" href="item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>">
          <img class="thumb_slide" src="uploads/thumbnail/<?php echo $row[10]; ?>" alt="">
        </a>
        <div>
          <h2 class="top_fix"><?php echo $row[1]; ?></h2>
          <ul>
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
        <button class="home__add" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"/></svg></button>
        <span class="home__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $row[14]; ?></span>
      </div>
      <?php
  	}
  	}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    ?>

  </div>

  <button class="home__nav home__nav--prev" data-nav="#flixtv-hero" type="button"></button>
  <button class="home__nav home__nav--next" data-nav="#flixtv-hero" type="button"></button>
</div>
