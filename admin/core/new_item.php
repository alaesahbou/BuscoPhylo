<?php
session_start();
require_once('../../db/config.php');
require_once('../../const/web-info.php');
require_once('../../const/check_session.php');
require_once('../../const/my_profile.php');


if (!empty($_POST['submit'])) {
	if (!file_exists("data/")) {
chmod("./", 0777);    
$cmd = escapeshellcmd('sudo php '.dirname(__DIR__).'/busco.php');
$dest = '/out.txt';
popen("$cmd > $dest 2>&1 &", 'r');

mkdir("data");
  }
  
  if (!file_exists("data/".$_POST['Project_Name'])) {
    mkdir("data/".$_POST['Project_Name']);
  $target_dir = "data/".$_POST['Project_Name']."/";
  } else {
    mkdir("data/".$_POST['Project_Name'].time());
  $target_dir = "data/".$_POST['Project_Name'].time()."/";
  }

$total_count = count($_FILES['fileToUpload']['name']);
  
    
for( $i=0 ; $i < $total_count ; $i++ ) {

$target_file0 = $target_dir . basename($_FILES["fileToUpload"]["name"][0]);

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
  
    $uploadOk = 1;


// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 0;
}



// Allow certain file formats


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
    


  } else {
  }
}
}
$x=$_POST['lineage'];
    $z=$target_dir;
    $name=$_POST['Project_Name'];
  $filecount = 0;
$files = glob($target_dir . "*fna");
if ($files){
 $filecount = count($files);
}

$upload_date = date('M d, Y h:i:s');
$item_id = time();
$title = $name;
$description = $z;
$year = date("Y");
$running_time = "Waiting list";
$plan_type = "BUSCO";
$age = $x;
$up_type = $imageFileType;
$genre = $_POST['mode'];
$destn_file_b = "TreeA.png";
$mail = "";
$destn_file = "TreeA.png";
$date_check = date('Y-m-d');
if(!empty($user_id)){
    $trailer=$user_id;
} else {
$trailer="";
}

    $email = $_POST['email_user'];



try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("INSERT INTO tbl_items (title, item_id, description, year, run_time, plan, age, upload_type, genres, thumbnail, trailer_link, upload_date, cover, email, views, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->execute([$title, $item_id, $description, $year, $running_time, $plan_type, $age, $up_type, $genre, $destn_file_b, $trailer, $upload_date, $destn_file, $email, $_POST['Project_groupe'], $date_check]);
$_SESSION["project"] = $item_id;




    

header("location:../../process.php");

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}



}else{
// header("location:../../");
}

?>

