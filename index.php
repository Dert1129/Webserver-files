<!DOCTYPE html>
<html>
    <head>
    <style>
    table{
        border: 2px solid black;
        table-layout: fixed;
        width: 200px;
        border-collapse: collapse;
        id="Select-b";
    }
    th, td{
        border: 2px solid black;
        width: 250px;
        overflow: hidden;
        border-collapse: collapse;
    } 
    tr:hover{background-color: grey;}
    tr:nth-child(all) {background-color: #f2f2f2;}

    h1{
        color: rgb(0,100,255);
    }
    p.num1{
        padding: 35px 70px;
    }
    .ellipsis{
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }
    
    .appadd {
        white-space: nowrap;
        overflow: hidden;
        width: 180px;
        height: 30px;
        text-overflow: ellipsis; 
}
    #mySearch {
        width: 100%;
        font-size: 18px;
        padding: 11px;
        border: 1px solid #ddd;
    }

/* Style the navigation menu */
    #myMenu {
        list-style-type: none;
        padding: 0;
        margin: 0;
        border: 1px solid black;
    }

/* Style the navigation links */
    #myMenu li a {
        padding: 12px;
        text-decoration: none;
        color: black;
        display: block
    }

    #myMenu li a:hover {
        background-color: #eee;
    }
    </style>
    <h1>
        <p class="num1"> All Job Information </p>
</h1>

</head>

<!--Define navigation menu format-->
<div class="row">
    <div class="left" style="background-color:#bbb;">
    <h2>Navigation</h2>
    <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search for jobs..">
    <ul id="myMenu">
     <li><a href="#">Due Date</a></li>
     <li><a href="#">Customer</a></li>
     <li><a href="#">Insert a new entry..</a></li>
    </ul>
    <script>
    function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
    </div>

<body style="background-color: rgb(214,214,214);">
    <p1>
    <div class="right" style="background-color:#ddd;">
        <h2>Job Table</h2>
    <table>
        <th>Technician</th>
        <th>Job_number</th>
        <th>Due_Date</th>
        <th>Customer</th>
        <th>Part_number</th>
        <th>Part_Description</th>
        <th>Qty</th>
</tr>
<?php

//connect to database
$serverName ="DESKTOP-88VUL4I";
$connectionInfo = array("Database"=>"Test Database");
$conn = sqlsrv_connect($serverName,$connectionInfo);

//display all jobs
?>
<img src="../../Customer/2021/John Deere/Quotes/29227/Thumbnail/DZ121668.png" alt="test_thumbnail">
<?php
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