<?php
if (isset($_SESSION['reply'])) {
	$error_code = $_SESSION['reply'];

    try {
		$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("SELECT * FROM tbl_alerts WHERE code = ?");
    $stmt->execute([$error_code]);
    $result = $stmt->fetchAll();

    foreach($result as $row)
    {
      ?>
			<div class="alert alert-<?php echo $row[1]; ?>" role="alert"><?php echo $row[2]; ?></div>
			 <?php
		 }


		}catch(PDOException $e)
    {

    }

    unset($_SESSION['reply']);


		}

?>
