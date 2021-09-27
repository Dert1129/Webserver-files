<?php 
function Bender(){
    require('../includes/dbh.inc.php');
    $stmt = $conn->prepare("SELECT * FROM Tube_Bender_Schedule;");
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
            $MasterPath = '//tiws07/dwg/Customer/'.$year . '/' . $row['Customer'].'/Jobs/'.$row['Master_Job_Number'];
            $altMasterPath = '//tiws07/dwg/Customer/'.$pastYear . '/' . $row['Customer'].'/Jobs/'.$row['Master_Job_Number'];
            if(is_dir($path)){
                $directory = "file://///tiws07/dwg/Customer/".$year."/".$row['Customer']. "/Jobs/". $row['Job_number'];
                $job = "<a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
            }elseif(is_dir($altPath)){
                $directory = "file://///tiws07/dwg/Customer/".$pastYear."/".$row['Customer']. "/Jobs/". $row['Job_number'];
                $job = "<a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
            }elseif(is_dir($MasterPath)){
                $MasterDirectory = "file://///tiws07/dwg/Customer/".$year."/".$row['Customer']. "/Jobs/". $row['Master_Job_Number'];
                $MasterJob = "<a href=\"$MasterDirectory"."\"> " . $row['Master_Job_Number'] . " </a> </td>";
            }elseif(is_dir($altMasterPath)){
                $MasterDirectory = "file://///tiws07/dwg/Customer/".$year."/".$row['Customer']. "/Jobs/". $row['Master_Job_Number'];
                $MasterJob = "<a href=\"$MasterDirectory"."\"> " . $row['Master_Job_Number'] . " </a> </td>";
            }else{
                $job = "Directory Not Yet Available <br> <br>".$row['Job_number'];
                $MasterJob = $row['Master_Job_Number'];
            }
            echo "<tr>";
            if($date < $current_date){
                $text = "text-danger";
            }else{
                $text = "";
            }
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Technician']."</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$job."</td>";
            echo "<td class='col-1 $text' style='height:8rem'>". $date. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>". $row['Customer']. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Part_Number']."</td>";   
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Status']."</td>"; 
            echo "<td class='col-1 $text' style='height:8rem'>".$MasterJob."</td>";            
            echo "<td class='col-1 $text' style='height:8rem'>". $row['Qty']. "</td>";
        }
    }else{
        die("Connection failed: ". mysqli_connect_error());
    }
}
?>