<?php
    function Table ($tablename){
        echo($tablename);
        require("//tiws07/DWG/Mfg Mtg/Nathan/Webserver files/includes/dbh.inc.php");
        $stmt = $conn->prepare("SELECT * FROM $tablename;");
        $stmt->execute();
        $result = $stmt->get_result();
        $Packaging = "PACKAGING";
        
        if(($result !== false)){
            while($row = $result->fetch_assoc()){
                $path = '//tiws07/DWG/Mfg Mtg/Nathan/Webserver files/Thumbnails/'.$row['Part_Number'].'.PNG';
                if((file_exists($path))&&($row['Thumbnail']=="No image available.png")){
                    $fileName = $row['Part_Number'].'.PNG';
                    $stmt = $conn->prepare("UPDATE $tablename SET Thumbnail = ? WHERE Part_Number = ?;");
                    $stmt->bind_param("ss", $fileName, $row['Part_Number']);
                    $stmt->execute();
                }

/*                 $date = date_format(new DateTime($row["Due_Date"]), "Y-m-d");
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
                    $stmt->execute();
                } */
            }
        }
    }
    Table("Customer_Job_Schedule");
    Table('2D_Laser_Schedule');
    Table("3D_Laser_Schedule");
    Table("Brake_baltec_Schedule");
    Table('Machining_Parts_Schedule');
    Table("Rolled_Shells_Schedule");
    Table("stamping_schedule");
    Table("Tooling_Schedule");
    Table("Tube_Bending_Schedule");
    Table('Tube_Laser_Schedule');
    Table('WeldAssy_Schedule');
?>