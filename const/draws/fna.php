<?php 



$filecount = 0;
error_reporting(0);
ini_set('display_errors', 0);
$files = glob($_SERVER["DOCUMENT_ROOT"]."/V2/admin/core/".$description."*".$type);
if ($files){
 $filecount = count($files);
}
$filecountout = 0;
$filesout = glob(dirname(dirname(__DIR__))."/admin/core/".$description."out/Tree.png");
if ($filesout){
 $filecountout = count($filesout);
} if($filecountout>0){$r=1;} 

if($r==1 && !file_exists(dirname(dirname(__DIR__))."/admin/core/".$description.'tree.pdf')){

require(dirname(dirname(__DIR__))."/admin/core/fpdf184/fpdf.php");

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Busco based phylogenomics app');
$pdf-> Image(dirname(dirname(__DIR__))."/admin/core/".$description."out/Tree.png",30,50,150,100);
$pdf->Output('F', dirname(dirname(__DIR__))."/admin/core/".$description.'tree.pdf', true);
}

if (!file_exists(dirname(dirname(__DIR__))."/results.json")) {
    $fp = fopen(dirname(dirname(__DIR__)).'/results.json', 'w');
    fwrite($fp, json_encode($response));
    fclose($fp);
}
$json = file_get_contents(dirname(dirname(__DIR__)).'/results.json');
 $data = json_decode($json,true);
  if (!empty($data["posts"][0]["output"])) {
    $output = $data["posts"][0]["output"];
  } else { $output = 'Done'; }
  if ($output=='Done') {
  try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $conn->prepare("SELECT * FROM tbl_items WHERE run_time='Waiting list' ORDER BY c_id LIMIT 1");
$stmt->execute();
$result = $stmt->fetchAll();
if (count($result) < 1) {
  
} else {
$response = array();
$posts = array();
foreach($result as $row)
{
$st1 = preg_replace("/[^a-zA-Z]/", " ", $row[1]);
$st2 =  preg_replace('/\s+/', ' ', $st1);
$item_title = strtolower(str_replace(' ', '-', $st2));

$title = $row[1];
$description = $row[3];
$age = $row[7];
$type = "f*";
$genres = $row[9];
$email = $row[17];
$outgroup = $row[15];

if ($rates < 10) {
  $rates = ''.$rates.'.0';
}
$posts[] = array('ID'=> $row[2], 'name'=> $title, 'lineage'=> $age, 'outgroup'=> $outgroup, 'mode'=> $genres, 'input'=> $description, 'output'=> 'Running', 'type'=> $type, 'email'=> $email);

$stmt = $conn->prepare("UPDATE tbl_items SET run_time='Running' WHERE item_id = ?");
$stmt->execute([$row[2]]);


}
$response['posts'] = $posts;

$fp = fopen(dirname(dirname(__DIR__)).'/results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
?>
<script> setTimeout(function(){ window.location.reload(1);}, 500);</script>
<?php
}
}catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
}


try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt2 = $conn->prepare("SELECT * FROM tbl_items WHERE item_id=?");
$stmt2->execute([$item_id]);
$result2 = $stmt2->fetchAll();
foreach($result2 as $row)
{
    if($row[5]=='Waiting list'){
        $_SESSION['project'] = $item_id;
        ?><meta http-equiv="refresh" content="0; URL=/process.php"><?php
    }
}
}catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}



error_reporting(0);
ini_set('display_errors', 0);




?>




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
            $streaming = "1";

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
        <style>
            @media only screen and (max-width: 1200px) {
  .tab-content {
                margin-top: 11%;  
              }
}
        </style>
    <div class="container" style="margin-bottom: 3%;">

      <div class="tab-content">

            <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
          <div class="row row--grid">
            <div class="col-12 col-xl-12">

              <div class="dashbox" style="background-color: white;">
                <div class="dashbox__title">
                  <h3 style="color: black;"><?php echo $title; ?></h3>
                  <h3 style="color: black;">Job ID : <?php echo $item_id; ?></h3>

                </div>

                <div class="dashbox__table-wrap dashbox__table-wrap--2">
                  <table id="datatbl2" class="main__table main__table--dash" style="border-bottom: 1px solid orange;">
                    <thead>
                      <tr>
                        <th style="color: black;">Lineage</th>
                        <th style="color: black;">Mode</th>
                        <th style="color: black;">Number of single copy genes</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        <tr>
                          <td style="color: black;"><?php echo $age; ?></td>
                          <td style="color: black;"><?php echo $row[9]; ?></td>
                          <td style="color: black;"><?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/core/'.$description.'out/proteins/')){
    echo exec('ls '.$_SERVER['DOCUMENT_ROOT'].'/admin/core/'.$description.'out/proteins/ | wc -l');} else { echo "No results yet"; }
    ?></td>
                        </tr>
                        

                    </tbody>
                  </table>
                  <br>
                  
                  <?php
                if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."out/RAxML_bipartitions.output_bootstrap.tre")){
                    $txt_file = fopen(dirname(dirname(__DIR__))."/admin/core/".$description."out/RAxML_bipartitions.output_bootstrap.tre",'r');
$a = 1;
while ($line = fgets($txt_file)) {
 $nwk = $line;
 $a++;
}
fclose($txt_file);
?> <!-- <img src="<?php // echo "../../admin/core/".$description."out/Tree.png"; ?>" alt="PhyloTree"><br> -->
<center><img src="../../admin/core/<?php echo $description; ?>out/tree.png" alt="Tree" width="80%"></center>
<br>
<a class='categories__item' href='../../admin/core/<?php echo $description; ?>out/tree.png' style='margin-left: 10px;' download><i class="fa-solid fa-image" style="margin-right: 3px"></i>Download image</a>
<a class='categories__item' href='../../admin/core/<?php echo $description; ?>out/tree.pdf' style='margin-left: 10px;' download><i class="fa-solid fa-file-pdf" style="margin-right: 3px"></i>Download pdf</a>
<style>
    .categories__item{
        color: white;
    }
    body {
        background-color: #f6f6f6;
    }
</style>
<?php
                } else { ?><script> setTimeout(function(){ window.location.reload(1);}, 5000);</script><?php }
                
                $total_items  = count( glob(dirname(dirname(__DIR__))."/admin/core/".$description."*.".$type) );
                $total_dirs  = count( glob(dirname(dirname(__DIR__))."/admin/core/".$description."outBusco/*"), GLOB_ONLYDIR );
                $count_busco  = count( glob(dirname(dirname(__DIR__))."/admin/core/".$description."outBusco/*/run_*/*.txt"), GLOB_ONLYDIR );
                if(($total_items == $total_dirs) || ((file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."busco")))){
                    $busco =true;
                    if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."busco")){
                        $singlecopy =true;
                        if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."out/RAxML_bootstrap.nwk")){
                        if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."out/RAxML_bipartitions.output_bootstrap.tre")){
                        echo "<a class='categories__item' href='../../admin/core/{$description}Result.zip' style='margin-left: 10px;'><i class='fa-solid fa-file-zipper' style='margin-right: 3px'></i>Download Result</a>"; $alignement =true;
                        if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."out/RAxML_bipartitions.output_bootstrap.tre")){
                            echo "<a class='categories__item' href='../../admin/core/{$description}BBPA.log' style='margin-left: 10px;' download><i class='fa-solid fa-file' style='margin-right: 3px'></i>Download log</a>"; $tree =true;
                        } else {
                            echo "<div style='margin-left: 20px;'><div style='color:white' >Creating phylogenomic Tree : Running<span id='wait'>.</span></div></div>

<script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";
                        }
                    } else {
                        echo "<div style='color:white' >Alignement : Running<span id='wait'>.</span></div>

<script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";
                    }
                    } else {
                        echo "<div style='color:white' >Creating phylogenetic bootstrap : Running<span id='wait'>.</span></div>

<script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";
                    }
                    } else {
                    echo "<div style='color:white' >Collecting Single Copy : Running<span id='wait'>.</span></div>

<script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";
                }
                } else {
                    
                  if($total_dirs>0){ echo "<div style='color:white' >Busco : Running<span id='wait'>.</span> $total_dirs/$total_items </div><br><div></div>

<script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";
                } else {echo "<div style='color:white' >Busco : Getting things ready for process<span id='wait2'>.</span></div>
                <script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait2');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";}
                 } ?>
                </div>
              </div>
            </div>
          </div>
        </div>



            

        <div class="tab-pane fade" id="tab-2" role="tabpanel">
          <div class="row row--grid postList">

            <?php
            try {
            $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM tbl_favourites LEFT JOIN tbl_items ON tbl_favourites.item = tbl_items.item_id WHERE tbl_items.status = 'Visible' AND tbl_favourites.user = ?");
            $stmt->execute([$user_id]);
            $result = $stmt->fetchAll();
            $postCount = count($result);

            if ($postCount > 0) {
              $pages = ($postCount/1);
            }else{
              $pages = 0;
            }
            $limit = 12;

            $stmt = $conn->prepare("SELECT * FROM tbl_favourites LEFT JOIN tbl_items ON tbl_favourites.item = tbl_items.item_id WHERE tbl_items.status = 'Visible' AND tbl_favourites.user = ? ORDER BY tbl_favourites.id DESC LIMIT 0,$limit");
            $stmt->execute([$user_id]);
            $result = $stmt->fetchAll();

            foreach($result as $row)
            {
              $st1 = preg_replace("/[^a-zA-Z]/", " ", $row[4]);
              $st2 =  preg_replace('/\s+/', ' ', $st1);
              $item_title = strtolower(str_replace(' ', '-', $st2));
              $genr = (explode(",",$row[12]));

              ?>
              <div class="col-6 col-sm-4 col-lg-3 col-xl-2" id="item<?php echo $row[0]; ?>">
                <div class="card card--favorites" >
                  <a href="item/<?php echo $row[5]; ?>/<?php echo $item_title; ?>" class="card__cover">
                    <img class="movie_cover" src="uploads/cover/<?php echo $row[16]; ?>" alt="">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </a>
                  <button id="<?php echo $row[0]; ?>" onclick="remove_fav(this.id);" class="card__add" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"/></svg></button>
                  <span class="card__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $row[17]; ?></span>
                  <h3 title="<?php echo $row[4]; ?>" class="top_fix card__title"><a href="item/<?php echo $row[4]; ?>/<?php echo $item_title; ?>"><?php echo $row[4]; ?></a></h3>
                  <ul class="card__list">
                    <li><?php echo $row[9]; ?></li>
                    <?php
                    $i = 0;
                    foreach( $genr as $el) {
                      if( $i >= 1) break;
                      ?><li><?php echo $el; ?></li><?php
                      $i++;
                    }
                    ?>
                    <li><?php echo $row[7]; ?></li>
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

          <div class="row">
            <div class="col-12" id="load_area" style="margin:auto">
             

            </div>
            <input type="hidden" id="row" value="0">
            <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
<section class="section" style="min-height:51vh; display: none"><div class="container" style="border: 1px solid black; padding: 10px 10px;">
    <h2><?php echo $title; ?></h2>
    <h3>Job ID : <?php echo $item_id; ?></h3>
    <p><?php
    $_SERVER['DOCUMENT_ROOT'] = dirname(dirname(__DIR__));
    echo 'Lineage : '.$age.' | Mode : '.$row[9].' '; 
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/core/'.$description.'out/proteins/')){
    echo '| Number of Single Copy genes : '.exec('ls '.$_SERVER['DOCUMENT_ROOT'].'/admin/core/'.$description.'out/proteins/ | wc -l'); 
    }
    ?>
    </p>
          <?php
          if ($GLOBALS['streaming'] == "1") {

          }else{
          ?><p style="margin-top:20px;" class="text_white"><?php echo $_SESSION['rs']; ?></p><?php
          }
          ?>
          <?php if($run_time=="Running"){ ?>
            
            <?php
                if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."out/RAxML_bipartitions.output_bootstrap.tre")){
                    $txt_file = fopen(dirname(dirname(__DIR__))."/admin/core/".$description."out/RAxML_bipartitions.output_bootstrap.tre",'r');
$a = 1;
while ($line = fgets($txt_file)) {
 $nwk = $line;
 $a++;
}
fclose($txt_file);
?> <!-- <img src="<?php // echo "../../admin/core/".$description."out/Tree.png"; ?>" alt="PhyloTree"><br> -->
<center><img src="../../admin/core/<?php echo $description; ?>out/tree.png" alt="Tree" width="80%"></center>
<br>
<a class='categories__item' href='../../admin/core/<?php echo $description; ?>out/tree.png' style='margin-left: 10px;' download><i class="fa-solid fa-image" style="margin-right: 3px"></i>Download image</a>
<a class='categories__item' href='../../admin/core/<?php echo $description; ?>out/tree.pdf' style='margin-left: 10px;' download><i class="fa-solid fa-file-pdf" style="margin-right: 3px"></i>Download pdf</a>
<style>
    .categories__item{
        color: white;
    }
</style>
<?php
                } else { ?><script> setTimeout(function(){ window.location.reload(1);}, 5000);</script><?php }
                
                $total_items  = count( glob(dirname(dirname(__DIR__))."/admin/core/".$description."*.".$type) );
                $total_dirs  = count( glob(dirname(dirname(__DIR__))."/admin/core/".$description."outBusco/*"), GLOB_ONLYDIR );
                $count_busco  = count( glob(dirname(dirname(__DIR__))."/admin/core/".$description."outBusco/*/run_*/*.txt"), GLOB_ONLYDIR );
                if(($total_items == $total_dirs) || ((file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."busco")))){
                    $busco =true;
                    if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."busco")){
                        $singlecopy =true;
                        if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."out/RAxML_bootstrap.nwk")){
                        if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."out/RAxML_bipartitions.output_bootstrap.tre")){
                        echo "<a class='categories__item' href='../../admin/core/{$description}Result.zip' style='margin-left: 10px;'><i class='fa-solid fa-file-zipper' style='margin-right: 3px'></i>Download Result</a>"; $alignement =true;
                        if(file_exists(dirname(dirname(__DIR__))."/admin/core/".$description."out/RAxML_bipartitions.output_bootstrap.tre")){
                            echo "<a class='categories__item' href='../../admin/core/{$description}BBPA.log' style='margin-left: 10px;' download><i class='fa-solid fa-file' style='margin-right: 3px'></i>Download log</a>"; $tree =true;
                        } else {
                            echo "<div style='margin-left: 20px;'><div>Creating phylogenomic Tree : Running<span id='wait'>.</span></div></div>

<script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";
                        }
                    } else {
                        echo "<div>Alignement : Running<span id='wait'>.</span></div>

<script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";
                    }
                    } else {
                        echo "<div>Creating phylogenetic bootstrap : Running<span id='wait'>.</span></div>

<script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";
                    }
                    } else {
                    echo "<div>Collecting Single Copy : Running<span id='wait'>.</span></div>

<script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";
                }
                } else {
                    
                  if($total_dirs>0){ echo "<div>Busco : Running<span id='wait'>.</span> $total_dirs/$total_items </div><br><div></div>

<script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";
                } else {echo "<div>Busco : Getting things ready for process<span id='wait2'>.</span></div>
                <script>
var dots = window.setInterval( function() {
    var wait = document.getElementById('wait2');
    if ( wait.innerHTML.length > 3 ) 
        wait.innerHTML = '';
    else 
        wait.innerHTML += '.';
    }, 200);
</script>";}
                }
                ?><?php } ?></div></section>
