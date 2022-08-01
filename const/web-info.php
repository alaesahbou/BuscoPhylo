<?php

try

    {
    $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("SELECT * FROM tbl_web_info LIMIT 1");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach($result as $row)
    {
      DEFINE('AppName', $row[0]);
      DEFINE('AppIcon', $row[1]);
      DEFINE('AppLogo', $row[2]);
      DEFINE('AppEmail', $row[3]);
      DEFINE('AppPhone', $row[4]);
      DEFINE('AppTimezone', $row[5]);
      DEFINE('AppTopTxt', $row[6]);
      DEFINE('AppKeywords', $row[7]);
      DEFINE('AppDesc', $row[8]);
      DEFINE('AppAuthBG', $row[9]);
      DEFINE('AppCurrency', $row[10]);
      DEFINE('AppISO', $row[11]);
      DEFINE('AppGuest', $row[12]);
      DEFINE('AppItemDetail', $row[13]);
      DEFINE('AppCustomScript', $row[14]);

      date_default_timezone_set(AppTimezone);
    }

    }catch(PDOException $e)
    {

    }

?>
