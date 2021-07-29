<?php
    include("./includes/dbh.inc.php");

    $mysql_host = "127.0.0.1";
    $mysql_database = "test";
    $mysql_user = "root";
    $mysql_password = "";

    $db = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);
    $sql = file_get_contents("//tiws07/dwg/Mfg Mtg/Nathan/Webserver Files/Schemas/Do everything Script.sql");

    $stmt = $db->prepare($sql);

    if($stmt->execute()){
        echo "Success";
    }else{
        echo "Failed";
    }
?>