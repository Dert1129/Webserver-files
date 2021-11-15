<?php 
function Rolled_Shells_Schedule(){
    global $Masterjob;
    require('../includes/dbh.inc.php');
    $stmt = $conn->prepare("SELECT * FROM Rolled_Shells_Schedule;");
    $stmt->execute();
    $result = $stmt->get_result(); 
    if ($result !==false){
        while ($row = $result->fetch_assoc()){
            $date = date_format(new DateTime($row["Due_Date"]), "Y-m-d");
            $current_date = date("Y-m-d");
            $year = date("Y");
            $pastYear = $year - 1;
            $job_Number = substr($row['Job_number'], 0, strpos($row['Job_number'], "-"));
            $Customer = preg_replace('/\s+/', '%20', $row['Customer']);
            $Master_Job_Number = substr($row['Master_Job_Number'], 0, strpos($row['Master_Job_Number'], "-"));
            $path = '//tiws07/dwg/Customer Files/'.$year.'/'.$row['Customer'].'/Jobs/'.$job_Number."/".$row['Job_number'];
            $altPath = '//tiws07/dwg/Customer Files/'.$pastYear.'/'. $row['Customer'].'/Jobs/'.$job_Number."/".$row['Job_number'];
            $masterPath = '//tiws07/dwg/Customer Files/'.$year.'/'. $row['Customer'].'/Jobs/'.$Master_Job_Number."/".$row['Master_Job_Number'];
            $altMasterPath = '//tiws07/dwg/Customer Files/'.$pastYear.'/'. $row['Customer'].'/Jobs/'.$Master_Job_Number."/".$row['Master_Job_Number'];
            if(is_dir($path)){
                $directory = "file://///tiws07/dwg/Customer%20Files/".$year."/".$Customer. "/Jobs/". $job_Number."/".$row['Job_number'];
                $job = "<a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
            }elseif(is_dir($altPath)){
                $directory = "file://///tiws07/dwg/Customer%20Files/".$pastYear."/".$Customer. "/Jobs/". $job_Number."/".$row['Job_number'];
                $job = "<a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
            }elseif(is_dir($masterPath)){
                $directory = "file://///tiws07/dwg/Customer%20Files/".$year."/".$Customer. "/Jobs/". $Master_Job_Number."/".$row['Master_Job_Number'];
                if(!isset($Masterjob)){
                    $Masterjob = "<a href=\"$directory"."\"> " . $row['Master_Job_Number'] . " </a> </td>";
                }
                $Masterjob = "<a href=\"$directory"."\"> " . $row['Master_Job_Number'] . " </a> </td>";
            }
            elseif(is_dir($altMasterPath)){
                $directory = "file://///tiws07/dwg/Customer%20Files/".$pastYear."/".$Customer. "/Jobs/". $Master_Job_Number."/".$row['Master_Job_Number'];
                if(!isset($Masterjob)){
                    $Masterjob = "<a href=\"$directory"."\"> " . $row['Master_Job_Number'] . " </a> </td>";
                }
                $Masterjob = "<a href=\"$directory"."\"> " . $row['Master_Job_Number'] . " </a> </td>";
                
            }else{
                $job = "Directory Not Yet Available <br> <br>".$row['Job_number'];
                if(!isset($Masterjob)){
                    $Masterjob = "Directory Not Yet Available <br> <br>".$row['Master_Job_Number'];
                }
                //$Masterjob = "Directory Not Yet Available <br> <br>".$row['Master_Job_Number'];
            }
            echo "<tr>";
            if($date < $current_date){
                $text = "text-danger";
            }else{
                $text = "";
            }
            if(strlen($row["Part_Number"])==2){
                echo "<td class='col-2 $text' style='height:8rem'>".$row['Thumbnail']."</td>";
            }elseif ($row['Part_Number']=="PACKAGING") {
                echo "<td class='col-2 $text' style='height:8rem'>".$row['Thumbnail']."</td>";
            }elseif($row['Thumbnail']=="No image available.png"){
                echo "<td class='col-2'>". "<img class='lozad' id='Thumbnail' data-src='../Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }elseif($row['Part_Number']==''){
                echo "<td class='col-2'>". "<img class='lozad' id='Thumbnail' data-src='../Thumbnails/No image available.png' width='170px' height='112px'>". "</td>";
            }else{
                echo "<td class='col-2'>". "<img class='lozad' data-src='../Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Technician']. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$job."</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$date. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Customer']."</td>";  
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Part_Number']."</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Qty_To_Make']."</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$Masterjob. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Qty_Left']. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Type']. "</td>";
        }
    }else{
        die("Connection failed: ". mysqli_connect_error());
    }
}
?>