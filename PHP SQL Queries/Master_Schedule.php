<?php
function Master_Schedule(){
    include('./includes/dbh.inc.php');
    $sql = "SELECT * FROM Job_Schedule_Details ORDER BY  Customer;";

    if(($result = sqlsrv_query($conn, $sql))!==false){
        while ($row = sqlsrv_fetch_array($result)){
            echo "<tr>";
            echo displayImages();
            echo "<td>". $row['Technician']. "</td>";
            echo "<td>". $row['Job_number']. "</td>";
            echo "<td>". $row['Due_Date']. "</td>";
            echo "<td>". $row['Customer']. "</td>";
            echo "<td>". $row['Part_number']. "</td>";
            echo "<td>". mb_strimwidth($row['Part_Description'],0,15,'...'). "</td>";
            echo "<td>". $row['Qty']. "</td>";
            }
    }else{
        die(print_r(sqlsrv_errors(), true)); //if the if statement fails, issue errors accordingly
    }
}
?>