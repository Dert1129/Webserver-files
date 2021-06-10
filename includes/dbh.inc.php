<?php

//connect to database
$serverName ="DESKTOP-88VUL4I";
$connectionInfo = array("Database"=>"Test Database");
$conn = sqlsrv_connect($serverName,$connectionInfo);

//display all jobs
?>