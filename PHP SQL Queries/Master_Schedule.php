<?php
function Master_Schedule(){
    include('./includes/dbh.inc.php');
    $sql = "SELECT * FROM Job_Schedule;";

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
/*
function Technician(){
    include('./includes/dbh.inc.php');
    $sql = "SELECT * FROM Job_Schedule_Details;";

    if(($result = sqlsrv_query($conn, $sql))!==false){
        while ($row = sqlsrv_fetch_array($result)){
            echo "<tr>";
            echo "<td>". $row['Technician']. "</td>";
            }
    }else{
        die(print_r(sqlsrv_errors(), true)); //if the if statement fails, issue errors accordingly
    }
}
*/
?>