<?php
$conn_array = array(
    "UID" => '\TIRPSNathanC',
    "PWD" => "",
    "Database"=>"Test Database",
);
$conn = sqlsrv_connect('DESKTOP-88VUL4I', $conn_array);
if($conn){
    echo "Connection established. <br />";
}else{
    echo "Connection could not be established.<br />";
    die(print_r(sql_errors(),true));
}

?>
