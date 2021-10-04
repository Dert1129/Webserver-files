<?php
    require("//tiws07/DWG/Mfg Mtg/Nathan/Webserver files/includes/dbh.inc.php");
    $stmt = $conn->prepare("SELECT * FROM Job_Schedule;");
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
            if(strlen($row["Part_Number"])==2){
                $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
                $stmt->bind_param("ss",$Thumbnail, $row['Part_Number']);
                $Thumbnail = $row['Part_Number'];
                $stmt->execute();
                $Thumbnail = "<td class='col-1 $text' style='height:8rem'>".$row['Thumbnail']."</td>";
            }elseif ($row['Part_Number']=="PACKAGING") {
                $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
                $stmt->bind_param("ss",$Packaging,$row['Part_Number']);
                $Packaging = "PACKAGING";
                $stmt->execute();
                $Thumbnail = "<td class='col-1 $text' style='height:8rem'>".$row['Thumbnail']."</td>";
            }elseif($row['Thumbnail']=="No image available.png"){
                $Thumbnail = "<td class='col-2'>". "<img class='lozad' id='Thumbnail' data-src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }else{
                $Thumbnail = "<td class='col-2'>". "<img class='lozad' data-src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }
        }
    }
?>