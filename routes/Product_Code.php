<?php
function SortProduct_Code(){
    include('../includes/dbh.inc.php');
    $sql = "SELECT * FROM Job_Schedule ORDER BY Product_Code;";

    if(($result = sqlsrv_query($conn, $sql))!==false){
        while ($row = sqlsrv_fetch_array($result)){
            echo "<tr>";
            //echo "<td></td>";
            echo "<td class='col-2'>". '<img src="data:image/png;base64,' .base64_encode($row['Thumbnail']). '" width="170px" height="112px">'. "</td>";
            echo "<td class='col-1'>". $row['Technician']. "</td>";
            echo "<td class='col-1'> <a href=\"file://///tiws07/dwg/Customer/2021/".$row['Customer']. "/Jobs/". $row['Job_number']. "\"> " . $row['Job_number'] . " </a> </td>";
            echo "<td class='col-1'>". $row['Due_Date']. "</td>";
            echo "<td class='col-1'>". $row['Customer']. "</td>";
            echo "<td class='col-1'>". $row['Part_Number']. "</td>";
            echo "<td class='col-1'>". mb_strimwidth($row['Part_Description'],0,15,'...'). "</td>";
            echo "<td class='col-1'>". $row['Customer_PO']. "</td>";
            echo "<td class='col-1'>". $row['Qty']. "</td>";
            echo "<td class='col-1'>". mb_strimwidth($row['Product_Code'],0,15,'...'). "</td>";
            }
    }else{
        die(print_r(sqlsrv_errors(), true)); //if the if statement fails, issue errors accordingly
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>All Job Information</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="extensions/sticky-header/bootstrap-table-sticky-header.css">
<script src="extensions/sticky-header/bootstrap-table-sticky-header.js"></script>
<link rel="stylesheet" href="../style and cleanup/table.css">

</head>
<body>
    <base href="localhost:8080"/>
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="table-wrapper">
                <table id="TableSchedule" class="table table-striped table-fixed">
                    <thead>
                        <tr>
                            <th class="col-1"><a href="http://195.100.202.209:8080">Home</a></th>
                        </tr>
                        <tr>
                            <!--<th scope="col">JSDID</th> -->
                            <th class="col-2">Thumbnail</th>
                            <th class="col-1"><a href="http://195.100.202.209:8080/routes/Technician.php">Technician</a></th>
                            <th class="col-1"><a href="http://195.100.202.209:8080/routes/Job_number.php">Job Number</a></th>
                            <th class="col-1"><a href="http://195.100.202.209:8080/routes/Due_Date.php">Due Date</a></th>
                            <th class="col-1"><a href="http://195.100.202.209:8080/routes/Customer.php">Customer</a></th>
                            <th class="col-1"><a href="http://195.100.202.209:8080/routes/Part_number.php">Part Number</a></th>
                            <th class="col-1"><a href="http://195.100.202.209:8080/routes/Part_Description.php">Part Description</a></th>
                            <th class="col-1"><a href="http://195.100.202.209:8080/routes/Customer_PO.php">Customer_PO</a></th>
                            <th class="col-1">Quantity</th>
                            <th class="col-1"><a href="http://195.100.202.209:8080/routes/Product_Code.php">Product Code</a></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td class="w-25">
                        <?php
                            include_once("../includes/dbh.inc.php");
                            SortProduct_Code();
                        ?>
                        </tr>
            </table>
        </div>
    </div>
</div>     
</body>
</html>