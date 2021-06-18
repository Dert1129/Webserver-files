<?php
function Master_Schedule(){
    include('./includes/dbh.inc.php');
    $sql = "SELECT * FROM Job_Schedule_Details;";

    if(($result = sqlsrv_query($conn, $sql))!==false){
        while ($row = sqlsrv_fetch_array($result)){
            echo "<tr>";
            echo "<td>". $row['JSDID']. "</td>";
            echo "<td></td>";
            //echo "<td>". "<input type=button onClick='Z:/Customer/2021/Cummins/Jobs/34135-05' value='%s'>". "</td>";
            echo "<td>". $row['Technician']. "</td>";
            //echo "<td><a href=\"file://///tiws07/dwg/Customer/2021/". "\">$row['']</a></td>";
            echo "<td> <a href=\"file://///tiws07/dwg/Customer/2021/" . "\"> " . $row['Job_number'] . " </a> </td>";
            //echo "<td>". $row['Job_number']. "</td>";
            echo "<td>". $row['Due_Date']. "</td>";
            echo "<td>". mb_strimwidth($row['Customer'],0,10,'...'). "</td>";
            echo "<td>". $row['Part_number']. "</td>";
            echo "<td>". mb_strimwidth($row['Part_Description'],0,10,'...'). "</td>";
            echo "<td>". $row['Qty']. "</td>";
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