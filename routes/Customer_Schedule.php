<?php 
function Customer_Schedule(){
    require('../includes/dbh.inc.php');
    $stmt = $conn->prepare("SELECT * FROM Customer_Job_Schedule;");
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
            $path = '//tiws07/dwg/Customer Files/'.$year . '/' . $row['Customer'].'/Jobs/'.$job_Number."/".$row['Job_number'];
            $altPath = '//tiws07/dwg/Customer Files/'.$pastYear . '/' . $row['Customer'].'/Jobs/'.$job_Number."/".$row['Job_number'];
            if(is_dir($path)){
                $directory = "file://///tiws07/dwg/Customer%20Files/".$year."/".$Customer. "/Jobs/". $job_Number."/".$row['Job_number'];
                $job = "<a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
            }elseif(is_dir($altPath)){
                $directory = "file://///tiws07/dwg/Customer%20Files/".$pastYear."/".$Customer. "/Jobs/". $job_Number."/".$row['Job_number'];
                $job = "<a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>"; 
            }else{
                $job = "Directory Not Yet Available <br> <br>".$row['Job_number'];
            }
            echo "<tr>";
            if($date < $current_date){
                $text = "text-danger";
            }else{
                $text = "";
            }
            if($row["Product_Code"]=="TL\r"){
                echo "<td class='col-2'>". "<img class='lozad' data-src='../Thumbnails/Stock Images/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }elseif($row["Product_Code"]=="SU\r"){
                echo "<td class='col-2'>". "<img class='lozad' data-src='../Thumbnails/Stock Images/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }elseif($row["Product_Code"]=="PITPRODUCTS\r"){
                echo "<td class='col-2'>". "<img class='lozad' data-src='../Thumbnails/Stock Images/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }elseif($row["Product_Code"]=="ENG\r"){
                echo "<td class='col-2'>". "<img class='lozad' data-src='../Thumbnails/Stock Images/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }elseif($row["Product_Code"]=="FIXT\r"){
                echo "<td class='col-2'>". "<img class='lozad' data-src='../Thumbnails/Stock Images/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }elseif($row["Product_Code"]=="HW\r"){
                echo "<td class='col-2'>". "<img class='lozad' data-src='../Thumbnails/Stock Images/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }elseif ($row['Part_Number']=="PACKAGING") {
                echo "<td class='col-2'>". "<img class='lozad' id='Thumbnail' data-src='../Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }elseif($row['Part_Number']==' '){
                echo "<td class='col-2'>". "<img class='lozad' id='Thumbnail' data-src='../Thumbnails/No image available.png' width='170px' height='112px'>". "</td>";
            }elseif($row['Thumbnail']=="No image available.png"){
                echo "<td class='col-2'>". "<img class='lozad' id='Thumbnail' data-src='../Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }else{
                echo "<td class='col-2'>". "<img class='lozad' data-src='../Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            }
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Technician']."</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$job."</td>";
            echo "<td class='col-1 $text' style='height:8rem'>". $date. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>". $row['Customer']. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>".$row['Part_Number']."</td>";          
            echo "<td class='col-1 $text' style='height:8rem'>". mb_strimwidth($row['Part_Description'],0,15,'...'). "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>". $row['Customer_PO']. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>". $row['Qty']. "</td>";
            echo "<td class='col-1 $text' style='height:8rem'>". mb_strimwidth($row['Product_Code'],0,15,'...'). "</td>";
        }
    }else{
        die("Connection failed: ". mysqli_connect_error());
    }
}
function product_Codes(){
    include("../includes/dbh.inc.php");
    $stmt = $conn->prepare("SELECT DISTINCT Product_Code FROM Customer_Job_Schedule ORDER BY Product_Code;");
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
            ?><input type="checkbox" name="name" class="name" value=<?php echo $row["Product_Code"]?>><?php echo $row["Product_Code"];?>
            <?php
        }
    }else{
        die("Connection failed: ". mysqli_connect_error());
    }
}
?>