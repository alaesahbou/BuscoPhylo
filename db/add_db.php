
<?php
if(isset($_POST['submit'])){
$myfile = fopen("config.php", "w") or die("Unable to open file!");
$txt = "<?php\n
//Database Server Name:\n
DEFINE('DBHost','".$_POST['Host']."');\n

//Database Username:\n
DEFINE('DBUser', '".$_POST['Username']."');\n

//Database Password:\n
DEFINE('DBPass','".$_POST['Password']."');\n

//Database Name:\n
DEFINE('DBName','busco_laravel2');\n

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

$servername = $_POST['Host'];
$username = $_POST['Username'];
$password = $_POST['Password'];
$link = mysqli_connect($servername, $username, $password);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create database query execution
$sql = "CREATE DATABASE busco_laravel2";
if(mysqli_query($link, $sql)){
    echo "Database created successfully";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

$database = "busco_laravel2"; //Change Your Database Name
$conn = new mysqli($servername, $username, $password, $database);

// Create database
$sql = "CREATE DATABASE busco_laravel";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$filename = 'busco_laravel.sql'; //How to Create SQL File Step : url:http://localhost/phpmyadmin->detabase select->table select->Export(In Upper Toolbar)->Go:DOWNLOAD .SQL FILE
$op_data = '';
$lines = file($filename);
foreach ($lines as $line)
{
    if (substr($line, 0, 2) == '--' || $line == '')//This IF Remove Comment Inside SQL FILE
    {
        continue;
    }
    $op_data .= $line;
    if (substr(trim($line), -1, 1) == ';')//Breack Line Upto ';' NEW QUERY
    {
        $conn->query($op_data);
        $op_data = '';
    }
}
echo "Table Created Inside busco_laravel Database.......";

header("location:../");

}

?>
