<?php
include_once('./includes/dbh.inc.php');
include_once('./PHP SQL Queries/Master_Schedule.php');
    $sql = 'SELECT * FROM Job_Schedule ORDER BY ';


    $columns = array('Thumbnail', 'Technician', 'Job_number', 'Due_date','Customer', 'Part_number', 'Part_description', "Customer_PO",'Quantity','Product_code');
    $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
    $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

    if($result = sqlsrv_query($conn, $sql, $columns)){
        $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
        $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
        $add_class = ' class="highlight"';
    }
?>