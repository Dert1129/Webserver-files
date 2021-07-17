<?php 
function Home(){
    require('./includes/dbh.inc.php');
    require("./style and cleanup/pictures.php");
    $stmt = mysqli_prepare($conn, "SELECT * FROM Job_Schedule;");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result !==false){
        while ($row = $result->fetch_assoc()){
            
            $date = date_format(new DateTime($row["Due_Date"]), "Y-m-d");
            $current_date = date("Y-m-d");
            $year = date("Y");
            $pastYear = $year - 1;
            $path = '//tiws07/dwg/Customer/'.$year . '/' . $row['Customer'].'/Jobs/'.$row['Job_number'];
            $altPath = '//tiws07/dwg/Customer/'.$pastYear . '/' . $row['Customer'].'/Jobs/'.$row['Job_number'];
            if(is_dir($path)){
                $directory = "file://///tiws07/dwg/Customer/".$year."/".$row['Customer']. "/Jobs/". $row['Job_number'];
            }else{
                $directory = "file://///tiws07/dwg/Customer/".$pastYear."/".$row['Customer']. "/Jobs/". $row['Job_number'];
            }
            echo "<tr>";
            echo "<td class='col-2'>". "<img src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
            if($date < $current_date){
                echo "<td class='col-1 text-danger'>". mb_strimwidth($row['Technician'],0,15,'...'). "</td>";
                echo "<td class='col-1 text-danger'> <a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
                echo "<td class='col-1 text-danger'>". $date. "</td>";
                echo "<td class='col-1 text-danger'>". $row['Customer']. "</td>";
                echo "<td class='col-1 text-danger'>". $row['Part_Number']. "</td>";
                echo "<td class='col-1 text-danger'>". mb_strimwidth($row['Part_Description'],0,15,'...'). "</td>";
                echo "<td class='col-1 text-danger'>". $row['Customer_PO']. "</td>";
                echo "<td class='col-1 text-danger'>". $row['Qty']. "</td>";
                echo "<td class='col-1 text-danger'>". mb_strimwidth($row['Product_Code'],0,15,'...'). "</td>";
            }else{
                echo "<td class='col-1'>". mb_strimwidth($row['Technician'],0,15,'...'). "</td>";
                echo "<td class='col-1'> <a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
                echo "<td class='col-1'>". $date. "</td>";
                echo "<td class='col-1'>". $row['Customer']. "</td>";
                echo "<td class='col-1'>". $row['Part_Number']. "</td>";
                echo "<td class='col-1'>". mb_strimwidth($row['Part_Description'],0,15,'...'). "</td>";
                echo "<td class='col-1'>". $row['Customer_PO']. "</td>";
                echo "<td class='col-1'>". $row['Qty']. "</td>";
                echo "<td class='col-1'>". mb_strimwidth($row['Product_Code'],0,15,'...'). "</td>";
            }
        }
    }else{
        die("Connection failed: ". mysqli_connect_error());
    }
}
function product_Codes(){
    include("./includes/dbh.inc.php");
    $stmt = mysqli_prepare($conn, "SELECT DISTINCT Product_Code FROM Job_Schedule ORDER BY Product_Code;");
    $stmt->execute();
    $result = $stmt->get_result();
            echo '<li>';
            echo '<label>';
            echo '<input type="checkbox" onclick="toggle(this);"/>Select all</input>';
            echo '</label>';
            echo '<li>';
    if($result !== false){
        while($row = $result->fetch_assoc()){
            echo '<li>';
            echo '<label>';
            ?><input type="checkbox" name="name" class="name" value=<?php echo $row["Product_Code"]?>/><?php echo $row["Product_Code"];?>
            <?php
        }
    }else{
        die("Connection failed: ". mysqli_connect_error());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Technicque Inc. Job Schedule, Developer: Nathan Creger"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>All Job Information</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script type="text/javascript" src="./tablesorter/jquery.tablesorter.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style and cleanup/table.css">
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="table-wrapper table-wrapper-scroll-y my-custom-scrollbar">
                    <img class="img-responsive" src="https://www.techniqueinc.com/wp-content/uploads/2018/04/logo-2.jpg" alt="Techniqueinc Logo"/>
                        <div class="input-group mb-3 form-group row mx-auto">
                            <input type="text" class="form-control" placeholder="Search.." id="myInput">
                                <div class="input-group-btn dropright">
                                    <button id="dd" type="button" class="btn dropdown-toggle font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Product Codes<span class="caret"></span></button>
                                            <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dd">
                                                <input type="text" class="form-control" placeholder="Search.." id="ddInput">
                                                <?php product_Codes();?> 
                                            </ul>
                                </div>     
                        </div>
                    <table id="sortTable" class="table table-striped table-fixed tablesorter table-sm ">
                        <thead>
                            <tr>
                                <label for="Headers" class="mx-auto">Click on table headers to sort</label>
                            </tr>
                            <tr style="text-align: left header" id="Headers">
                                <th class="col-2">Thumbnail</th>
                                <th class="col-1">Technician</th>
                                <th class="col-1">Job Number</th>
                                <th class="col-1">Due Date</th>
                                <th class="col-1">Customer</th>
                                <th class="col-1">Part Number</th>
                                <th class="col-1">Part Description</th>
                                <th class="col-1">Customer_PO</th>
                                <th class="col-1">Quantity</th>
                                <th class="col-1">Product Code</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <?php
                                    require("./includes/dbh.inc.php");
                                    require_once("./style and cleanup/pictures.php");
                                    Home();
                                ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
    
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    $(document).ready(function(){
      $("#ddInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".dropdown-menu li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    $(function() {
      $("#sortTable").tablesorter();
    });
    $(document).on('click', '.allow-focus', function (e) {
      e.stopPropagation();
    });
    // Listen for click on toggle checkbox
    function toggle(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        };
    };
    $(document).ready(function(){
        $(".name").on("click", function() {
            name_list = []
            $("#myTable tr").hide()
            var flag = 1
            $("input:checkbox[name=name]:checked").each(function(){
  		        flag = 0;
    	        var value = $(this).val().toLowerCase();
      	        $("#myTable tr").filter(function() {
                    if($(this).text().toLowerCase().indexOf(value) > -1)
            	            $(this).show()
    	            });
 	        });
        if(flag == 1)
        	$("#myTable tr").show()
        });
    });
    </script>
</body>
</html>