<?php 
function Home(){
    require('./includes/dbh.inc.php');
    require("./style and cleanup/pictures.php");
    $stmt = $conn->prepare("SELECT * FROM Job_Schedule ORDER BY Due_Date ASC;");
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
                $job = "Directory Not Yet Available <br> <br>".$row['Job_number'];
            }
            echo "<tr>";
            if($date < $current_date){
                $text = "text-danger";
                if(strlen($row["Part_Number"])==2){
                    $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
                    $stmt->bind_param("ss",$Thumbnail, $row['Part_Number']);
                    $Thumbnail = $row['Part_Number'];
                    $stmt->execute();
                    echo "<td class='col-2 text-danger' style='height:122.59px'>".$row['Thumbnail']."</td>";
                }elseif ($row['Part_Number']=="PACKAGING") {
                    $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
                    $stmt->bind_param("ss",$Packaging,$row['Part_Number']);
                    $Packaging = "PACKAGING";
                    $stmt->execute();
                    echo "<td class='col-2 text-danger' style='height:122.59px'>".$row['Thumbnail']."</td>";
                }elseif($row['Thumbnail']=="No image available.png"){
                    echo "<td class='col-2'>". "<img class='lozad' id='Thumbnail' data-src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
                }else{
                    echo "<td class='col-2'>". "<img class='lozad' data-src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
                }
            }else{
                $text = "";
                if(strlen($row["Part_Number"])==2){
                    $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
                    $stmt->bind_param("ss",$Thumbnail, $row['Part_Number']);
                    $Thumbnail = $row['Part_Number'];
                    $stmt->execute();
                    echo "<td class='col-2' style='height:122.59px'>".$row['Thumbnail']."</td>";
                }elseif ($row['Part_Number']=="PACKAGING") {
                    $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
                    $stmt->bind_param("ss",$Packaging,$row['Part_Number']);
                    $Packaging = "PACKAGING";
                    $stmt->execute();
                    echo "<td class='col-2' style='height:122.59px'>".$row['Thumbnail']."</td>";
                }elseif($row['Thumbnail']=="No image available.png"){
                    echo "<td class='col-2'>". "<img class='lozad' id='Thumbnail' data-src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
                }else{
                    echo "<td class='col-2'>". "<img class='lozad' data-src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
                }
            }
            echo "<td class='col-1 $text' style='height:122.59px'>".$job."</td>";
            echo "<td class='col-1 $text' style='height:122.59px'>". mb_strimwidth($row['Technician'],0,15,'...'). "</td>";
            echo "<td class='col-1 $text' style='height:122.59px'>". $date. "</td>";
            echo "<td class='col-1 $text' style='height:122.59px'>". $row['Customer']. "</td>";
            echo "<td class='col-1 $text' style='height:122.59px'>".$row['Part_Number']."</td>";          
            echo "<td class='col-1 $text' style='height:122.59px'>". mb_strimwidth($row['Part_Description'],0,15,'...'). "</td>";
            echo "<td class='col-1 $text' style='height:122.59px'>". $row['Customer_PO']. "</td>";
            echo "<td class='col-1 $text' style='height:122.59px'>". $row['Qty']. "</td>";
            echo "<td class='col-1 $text' style='height:122.59px'>". mb_strimwidth($row['Product_Code'],0,15,'...'). "</td>";
        }
    }else{
        die("Connection failed: ". mysqli_connect_error());
    }
}
function product_Codes(){
    include("./includes/dbh.inc.php");
    $stmt = $conn->prepare("SELECT DISTINCT Product_Code FROM Job_Schedule ORDER BY Product_Code;");
    $stmt->execute();
    $result = $stmt->get_result();
    echo "<li>";
    echo "<label>";
    echo "<input type='checkbox' id='selectAll'>Select All</input>";
    echo "</label>";
    echo "</li>";
    echo "<hr class='solid'>";
    if($result !== false){
        while($row = $result->fetch_assoc()){
            echo '<li>';
            echo '<label>';
            ?><input type="checkbox" name="name" class="name" value=<?php echo $row["Product_Code"]?>/><?php echo $row["Product_Code"];?>
            <?php
        }
    }else{
        die("Connection failed: ". mysqli_connect_error());
    }
}
?>