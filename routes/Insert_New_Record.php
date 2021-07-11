<?php
    include_once("../includes/dbh.inc.php");
    include("./New_Record.html");
    if(isset($_POST['submit'])){
        $stmt = $conn->prepare("INSERT INTO Job_Schedule (Technician, Job_number, Due_Date, Customer, Part_Number, Part_Description, Customer_PO, Qty,   Product_Code)VALUES (?,?,?,?,?,?,?,?,?);");

        $Technician = $_POST['Technician'];
        $job_number = $_POST['Job_number'];
        $Due_Date = $_POST['Due_Date'];
        $Customer = $_POST['Customer'];
        $Part_Number = $_POST['Part_Number'];
        $Part_Description = $_POST['Part_Description'];
        $Customer_PO = $_POST['Customer_PO'];
        $Qty = $_POST['Qty'];
        $Product_Code = $_POST['Product_Code'];

        $stmt->bind_param("sssssssss", $Technician, $job_number, $Due_Date, $Customer,  $Part_Number, $Part_Description, $Customer_PO, $Qty, $Product_Code);
        $stmt->execute();
        echo "Record inserted!";
    }else{
        echo "Record failed while inserting";
        die(mysqli_connect_error());
    }
?>