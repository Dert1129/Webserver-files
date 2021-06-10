<!DOCTYPE html>
<html>
    <head>
<?php
include_once('./includes/dbh.inc.php');
include_once('./Style and cleanup/Table.html');
include_once('./Style and cleanup/Navigation.html');
include_once('./Style and cleanup/Pictures.html');


if(($result = sqlsrv_query($conn, "SELECT * FROM Job_Schedule_details;"))!==false){
    while ($row = sqlsrv_fetch_array($result)){
        echo "<tr>";
        echo "<td>". $row['Technician']. "</td>";
        echo "<td>". $row['Job_number']. "</td>";
        echo "<td>". $row['Due_Date']. "</td>";
        echo "<td>". $row['Customer']. "</td>";
        echo "<td>". $row['Part_number']. "</td>";
        echo "<td>". mb_strimwidth($row['Part_Description'],0,20,'...'). "</td>";
        echo "<td>". $row['Qty']. "</td>";
        }
}else{
    die(print_r(sqlsrv_errors(), true)); //if the if statement fails, issue errors accordingly
}
?>
</p1>
</div>
<?php
    //Find a item in the db related to what is searched
    $result = sqlsrv_query($conn, "SELECT * FROM Job_Schedule_Details ORDER BY Customer");
    while ($row = sqlsrv_fetch_array($result)){
        echo "<div id='link' onClick='addText(\"". "<td>". $row['JSDID']. "</td>";
    }
?>
</body>
</html>