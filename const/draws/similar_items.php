<?php

$query_parts = array();
foreach ($genres as $val) {
    $query_parts[] = "'%".$val."%'";
}

$string = implode(' OR genres LIKE ', $query_parts);



?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section__title"><a>Similar Projects</a></h2>
      </div>

<div class="col-12">
  <div class="section__carousel-wrap">
    <div class="section__carousel owl-carousel" id="similar">

      <?php
      try {
      $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_items WHERE genres LIKE {$string} LIMIT 12");
      $stmt->execute();
      $result = $stmt->fetchAll();
      foreach($result as $row)
      {
        if ($row[16] == "Visible") {
          if ($row[2] == $item_id) {

          }else{

            $st1 = preg_replace("/[^a-zA-Z]/", " ", $row[1]);
            $st2 =  preg_replace('/\s+/', ' ', $st1);
            $item_title = strtolower(str_replace(' ', '-', $st2));
            $genr = (explode(",",$row[9]));

            ?>
            <div class="card">
              <a href="../../item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>" class="card__cover">
                <?php if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$row[3].'tree.png')){ ?><img class="movie_cover" src="../../admin/core/<?php echo $row[3]; ?>tree.png" alt=""><?php } else { ?><img class="movie_cover" src="../../uploads/cover/<?php echo $row[13]; ?>" alt=""><?php } ?>
              </a>
              <h3 title="<?php echo $row[1]; ?>" class="top_fix card__title"><a href="../../item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>"><?php echo $row[1]; ?></a></h3>
              
            </div>
            <?php
          }
        }
      }
      }catch(PDOException $e)
      {
      echo "Connection failed: " . $e->getMessage();
      }
      ?>
    </div>

    <button class="section__nav section__nav--cards section__nav--prev" data-nav="#similar" type="button"><svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.25 7.72559L16.25 7.72559" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
    <button class="section__nav section__nav--cards section__nav--next" data-nav="#similar" type="button"><svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.75 7.72559L0.75 7.72559" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
  </div>
</div>
</div>
</div>
</section>
