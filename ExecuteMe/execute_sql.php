<?php
function Customer_Schedule($Filename){
    $mysql_host = "127.0.0.1";
    $mysql_database = "webserver";
    $mysql_user = "root";
    $mysql_password = "";
    $db = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);
    $sql = file_get_contents("//tiws07/dwg/Mfg Mtg/Nathan/Webserver Files/Schemas/".$Filename);
    $stmt = $db->prepare($sql);
    if($stmt->execute()){
        echo "Success\n";
    }else{
        echo "Failed\n";
    }
        
    }
    Customer_Schedule("Customer_Schedule.sql");
    Customer_Schedule("2D_Laser_Schedule.sql");
    Customer_Schedule("3D_Laser_Schedule.sql");
    Customer_Schedule("Brake & Baltec.sql");
    Customer_Schedule("Machining_Parts.sql");
    Customer_Schedule("Rolled_Shells_Schedule.sql");
    Customer_Schedule("Stamping_Schedule.sql");
    Customer_Schedule("Tooling_Schedule.sql");
    Customer_Schedule("Tube_Bending_Schedule.sql");
    Customer_Schedule("Tube_Laser_Schedule.sql");
    Customer_Schedule("WeldAssy_Schedule.sql");
    date_default_timezone_set("America/Detroit");
    file_put_contents ('//tiws07/dwg/Mfg Mtg/Nathan/Webserver Files/update.html', '<link href="./Style and cleanup/txtstyle.css" rel="stylesheet" type="text/css" />'."\n"."Last Updated: ".date("Y-m-d")." at ".date("g:iA"));
    echo "Updated Timestamp";
?>