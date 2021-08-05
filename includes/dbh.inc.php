<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "webserver";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }  
?>