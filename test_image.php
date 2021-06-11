<?php
include_once('./includes/dbh.inc.php');
include_once('./Style and cleanup/Table.html');
$sql = "SELECT * FROM images;";
if(($result = sqlsrv_query($conn, $sql))!==false){
    while ($row = sqlsrv_fetch($result)){
        $image = sqlsrv_get_field($result,0);
        echo "$image: ";
    }

    }else{
        die(print_r(sqlsrv_errors(), true));
    }
?>
