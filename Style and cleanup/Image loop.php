<?php
    include_once('./includes/dbh.inc.php');
    function loopImages(){
        $sql = 'SELECT * FROM Job_Schedule_Details';
        if(($result = sqlsrv_query($conn, $sql))!==false){
            while($row = sqlsrv_fetch_array($result)){
                echo"<td>".$row['JSDID']."</td>";
            }
        }else{
            die(print_r(sqlsrv_errors(),true));
        }

    }
?>
