<?php 
function Tooling_parts(){
    require('../includes/dbh.inc.php');
    $stmt = $conn->prepare("SELECT * FROM Tooling_Parts_Schedule;");
    $stmt->execute();
    $result = $stmt->get_result(); 
    if ($result !==false){
        while ($row = $result->fetch_assoc()){
            $date = date_format(new DateTime($row["Due_Date"]), "Y-m-d");
            $current_date = date("Y-m-d");
            $year = date("Y");
            $pastYear = $year - 1;
            $path = '//tiws07/dwg/Customer/'.$year . '/' . $row['Customer'].'/Jobs/'.$row['Job_number'];
            $altPath = '//tiws07/dwg/Customer/'.$pastYear . '/' . $row['Customer'].'/Jobs/'.$row['Job_number'];
            if(is_dir($path)){
                $directory = "file://///tiws07/dwg/Customer/".$year."/".$row['Customer']. "/Jobs/". $row['Job_number'];
                $job = "<a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
            }elseif(is_dir($altPath)){
                $directory = "file://///tiws07/dwg/Customer/".$pastYear."/".$row['Customer']. "/Jobs/". $row['Job_number'];
                $job = "<a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
            }else{
                $job = $row['Job_number'];
            }
            echo "<tr>";
            if($date < $current_date){
                $text = "text-danger";
            }else{
                $text = "";
            }
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Customer']. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$job."</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$date. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Part_Number']. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Qty_Ordered']."</td>";  
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Qty_Open']."</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Done']."</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Work_Center']."</td>";
        }
    }else{
        die("Connection failed: ". mysqli_connect_error());
    }
}
?>