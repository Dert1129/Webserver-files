<?php
function Home(){
    require('./includes/dbh.inc.php');
    require("./style and cleanup/pictures.php");
    //include("./includes/mysqlconn.php");
    $stmt = mysqli_prepare($conn, "SELECT * FROM Job_Schedule;");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result !==false){
        while ($row = $result->fetch_assoc()){

            $date = date_format(new DateTime($row["Due_Date"]), "Y-m-j");
            $current_date = date("Y-m-j");
            $directory = "file://///tiws07/dwg/Customer/".$row['Year']."/".$row['Customer']. "/Jobs/". $row['Job_number'];
            echo "<tr>";
            echo "<td class='col-2'>". "<img src='http://195.100.202.209:8080/Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            if($date < $current_date){
                echo "<td class='col-1 text-danger'>". mb_strimwidth($row['Technician'],0,15,'...'). "</td>";
            }else{
                echo "<td class='col-1'>". mb_strimwidth($row['Technician'],0,15,'...'). "</td>";
            }
            if($date < $current_date){
                echo "<td class='col-1 text-danger'> <a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
            }else{
                echo "<td class='col-1'> <a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
            }
            if($date < $current_date){
                echo "<td class='col-1 text-danger'>". $date. "</td>";
            }else{
                echo "<td class='col-1'>". $date. "</td>";
            }
            if($date < $current_date){
                echo "<td class='col-1 text-danger'>". $row['Customer']. "</td>";
            }else{
                echo "<td class='col-1'>". $row['Customer']. "</td>";
            }
            if($date < $current_date){
                echo "<td class='col-1 text-danger'>". $row['Part_Number']. "</td>";
            }else{
                echo "<td class='col-1'>". $row['Part_Number']. "</td>";
            }
            if($date < $current_date){
                echo "<td class='col-1 text-danger'>". mb_strimwidth($row['Part_Description'],0,15,'...'). "</td>";
            }else{
                echo "<td class='col-1'>". mb_strimwidth($row['Part_Description'],0,15,'...'). "</td>";
            }
            if($date < $current_date){
                echo "<td class='col-1 text-danger'>". $row['Customer_PO']. "</td>";
            }else{
                echo "<td class='col-1'>". $row['Customer_PO']. "</td>";
            }
            if($date < $current_date){
                echo "<td class='col-1 text-danger'>". $row['Qty']. "</td>";
            }else{
                echo "<td class='col-1'>". $row['Qty']. "</td>";
            }
            if($date < $current_date){
                echo "<td class='col-1 text-danger'>". mb_strimwidth($row['Product_Code'],0,15,'...'). "</td>";
            }else{
                echo "<td class='col-1'>". mb_strimwidth($row['Product_Code'],0,15,'...'). "</td>";
            }
            
        }
    }if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
<title>All Job Information</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="extensions/sticky-header/bootstrap-table-sticky-header.css">
<script src="extensions/sticky-header/bootstrap-table-sticky-header.js"></script>
<link rel="stylesheet" href="../style and cleanup/table.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="./tablesorter/jquery.tablesorter.js"></script>
</head>
<body>
    <base href="localhost:8080"/>
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="table-wrapper">
                <img class="img-responsive" src="https://www.techniqueinc.com/wp-content/uploads/2018/04/logo-2.jpg" alt="Techniqueinc Logo"/>
                <table id="sortTable" class="table table-striped table-fixed tablesorter">
                    <thead>
                        <tr>
                            <div class="form-group row">
                                <div class="mx-auto" style="width: 600px">
                                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                </div>
                            </div>
                        </tr>
                        <div style="overflow-x: auto;">
                            <tr id="Headers">
                                <label for="Headers" class="mx-auto">Click on table headers to sort</label>
                                <th class="col-2">Thumbnail</th>
                                <th class="col-1">Technician</a></th>
                                <th class="col-1">Job Number</a></th>
                                <th class="col-1">Due Date</a></th>
                                <th class="col-1">Customer</a></th>
                                <th class="col-1">Part Number</a></th>
                                <th class="col-1">Part Description</a></th>
                                <th class="col-1">Customer_PO</a></th>
                                <th class="col-1">Quantity</th>
                                <th class="col-1">Product Code</a></th>
                            </tr>
                        </div>
                    </thead>
                    <tbody>
                        <tr>
                        <td class="w-25">
                        <?php
                            require("./includes/dbh.inc.php");
                            require_once("./style and cleanup/pictures.php");
                            Home();
                        ?>
                        </tr>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#sortTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
$(function() {
  $("#sortTable").tablesorter();
});
</script> 
</body>
</html>