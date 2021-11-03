<?php
    function Table ($tablename){
        require("//tiws07/DWG/Mfg Mtg/Nathan/Webserver files/includes/dbh.inc.php");
        $stmt = $conn->prepare("SELECT * FROM $tablename;");
        $stmt->execute();
        $result = $stmt->get_result();
        if($result !== false){
            while($row = $result->fetch_assoc()){
                $date = date_format(new DateTime($row["Due_Date"]), "Y-m-d");
                $current_date = date("Y-m-d");
                if($date < $current_date){
                    $text = "text-danger";
                }else{
                    $text = "";
                }
                $files = scandir('//tiws07/DWG/Mfg Mtg/Nathan/Webserver files/Thumbnails/');
                foreach ($files as $file) {
                  if ($file !== "." && $file !== "..") {
                    $name = strstr($file, '.png', TRUE);
                    if($row['Part_Number']==$name){
                        $stmt = $conn->prepare("UPDATE $tablename SET Thumbnail = ? WHERE Part_Number = ?;");
                        $stmt->bind_param("ss", $file, $name);
                        $files = scandir('//tiws07/DWG/Mfg Mtg/Nathan/Webserver files/Thumbnails/');
                        $stmt->execute();
                       }
                     }
                   }
                if ($row['Part_Number']=="PACKAGING") {
                    $stmt = $conn->prepare("UPDATE $tablename SET Thumbnail = ? WHERE Part_Number = ?;");
                    $stmt->bind_param("ss",$Packaging,$row['Part_Number']);
                    $Packaging = "PACKAGING";
                    $stmt->execute();
                }
            }
        }
    }
    table("Job_Schedule");/*
    table('2D_Laser_Schedule');
    table("Brake_Baltec_Schedule");
    table("Rolled_Sheet_Schedule");
    table('Spacegear_Schedule');
    table("Stamping_Schedule");
    table("Tooling_Parts_Schedule");
    table("Tooling_Schedule");
    table("Tube_Bender_Schedule");
    table('Tube_Laser_Schedule');
    table('WeldAssy_Schedule');*/
?>