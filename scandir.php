<?php
require("./includes/dbh.inc.php");
$stmt = mysqli_prepare($conn, "SELECT * FROM Job_Schedule;");
$stmt->execute();
$result = $stmt->get_result();
if($result !==false){
    while($row = $result->fetch_assoc()){
        $year = date("Y");
        $pastYear = $year - 1;
        $path = '//tiws07/dwg/Customer/'.$year . '/' . $row['Customer'].'/Jobs/'.$row['Job_number'];
        $altPath = '//tiws07/dwg/Customer/'.$pastYear . '/' . $row['Customer'].'/Jobs/'.$row['Job_number'];
        if(is_dir($path)){
                echo $path. "</br>";
        }else if(is_dir($altPath)){
            echo $altPath . "</br>";
        }else{
            echo "No file found </br>";
        }
    }
}
?>