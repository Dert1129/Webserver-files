<?php 
function Home(){
    require('./includes/dbh.inc.php');
    require("./style and cleanup/pictures.php");
    $stmt = $conn->prepare("SELECT * FROM Job_Schedule ORDER BY Due_Date ASC;");
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
            if($date < $current_date){
                if(strlen($row["Part_Number"])==2){
                    $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
                    $stmt->bind_param("ss",$Thumbnail, $row['Part_Number']);
                    $Thumbnail = $row['Part_Number'];
                    $stmt->execute();
                    echo "<td class='col-2 text-danger' style='height:122.59px'>".$row['Thumbnail']."</td>";
                }elseif ($row['Part_Number']=="PACKAGING") {
                    $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
                    $stmt->bind_param("ss",$Packaging,$row['Part_Number']);
                    $Packaging = "PACKAGING";
                    $stmt->execute();
                    echo "<td class='col-2 text-danger' style='height:122.59px'>".$row['Thumbnail']."</td>";
                }elseif($row['Thumbnail']=="No image available.png"){
                    echo "<td class='col-2'>". "<img id='Thumbnail' src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
                }else{
                    echo "<td class='col-2'>". "<img src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
                }
                echo "<td class='col-1 text-danger' style='height:122.59px'>". mb_strimwidth($row['Technician'],0,15,'...'). "</td>";
                echo "<td class='col-1 text-danger' style='height:122.59px'> <a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
                echo "<td class='col-1 text-danger' style='height:122.59px'>". $date. "</td>";
                echo "<td class='col-1 text-danger' style='height:122.59px'>". $row['Customer']. "</td>";
                echo "<td class='col-1 text-danger' style='height:122.59px'>".$row['Part_Number']."</td>"; 
                echo "<td class='col-1 text-danger' style='height:122.59px'>". mb_strimwidth($row['Part_Description'],0,15,'...'). "</td>";
                echo "<td class='col-1 text-danger' style='height:122.59px'>". $row['Customer_PO']. "</td>";
                echo "<td class='col-1 text-danger' style='height:122.59px'>". $row['Qty']. "</td>";
                echo "<td class='col-1 text-danger' style='height:122.59px'>". mb_strimwidth($row['Product_Code'],0,15,'...'). "</td>";
            }else{
                if(strlen($row["Part_Number"])==2){
                    $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
                    $stmt->bind_param("ss",$Thumbnail, $row['Part_Number']);
                    $Thumbnail = $row['Part_Number'];
                    $stmt->execute();
                    echo "<td class='col-2' style='height:122.59px'>".$row['Thumbnail']."</td>";
                }elseif ($row['Part_Number']=="PACKAGING") {
                    $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
                    $stmt->bind_param("ss",$Packaging,$row['Part_Number']);
                    $Packaging = "PACKAGING";
                    $stmt->execute();
                    echo "<td class='col-2' style='height:122.59px'>".$row['Thumbnail']."</td>";
                }elseif($row['Thumbnail']=="No image available.png"){
                    echo "<td class='col-2'>". "<img id='Thumbnail' src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
                }else{
                    echo "<td class='col-2'>". "<img src='./Thumbnails/".$row['Thumbnail']."' width='170px' height='112px'>". "</td>";
                }
                echo "<td class='col-1' style='height:122.59px'>". mb_strimwidth($row['Technician'],0,15,'...'). "</td>";
                echo "<td class='col-1' style='height:122.59px'> <a href=\"$directory"."\"> " . $row['Job_number'] . " </a> </td>";
                echo "<td class='col-1' style='height:122.59px'>". $date. "</td>";
                echo "<td class='col-1' style='height:122.59px'>". $row['Customer']. "</td>";
                echo "<td class='col-1' style='height:122.59px'>".$row['Part_Number']."</td>";          
                echo "<td class='col-1' style='height:122.59px'>". mb_strimwidth($row['Part_Description'],0,15,'...'). "</td>";
                echo "<td class='col-1' style='height:122.59px'>". $row['Customer_PO']. "</td>";
                echo "<td class='col-1' style='height:122.59px'>". $row['Qty']. "</td>";
                echo "<td class='col-1' style='height:122.59px'>". mb_strimwidth($row['Product_Code'],0,15,'...'). "</td>";
            }
        }
    }else{
        die("Connection failed: ". mysqli_connect_error());
    }
}
function product_Codes(){
    include("./includes/dbh.inc.php");
    $stmt = $conn->prepare("SELECT DISTINCT Product_Code FROM Job_Schedule ORDER BY Product_Code;");
    $stmt->execute();
    $result = $stmt->get_result();
    echo "<li>";
    echo "<label>";
    echo "<input type='checkbox' id='selectAll'>Select All</input>";
    echo "</label";
    echo "</li>";
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
                        <div class="input-group mb-3 row mx-auto">
                                <input type="text" class="form-control" placeholder="Search.." id="myInput">
                                <button id ="clearSearch" type="button" class="btn btn-outline-dark" onclick="document.getElementById('myInput').value = ''"><i class="fa fa-times" aria-hidden="true"></i></button>
                                <div class="input-group-btn dropright">
                                    <button id="dd" type="button" class="btn btn-outline-dark dropdown-toggle font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Product Codes<span class="caret"></span></button>
                                            <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dd">
                                                <input type="text" class="form-control" placeholder="Search.." id="ddInput">
                                                <li class="divider"></li>
                                                <?php product_Codes();?> 
                                            </ul>
                                </div>     
                        </div>
                    <table id="sortTable" class="table table-striped table-fixed tablesorter table-sm" data-card-width="768">
                        <thead>
                            <tr style="text-align: left header" id="Headers">
                                <th class="col-2">Thumbnail <i class="fa fa-sort-up" ></i></th>
                                <th class="col-1">Technician <i class="fa fa-sort-up" ></i></th>
                                <th class="col-1">Job Number <i class="fa fa-sort-up" ></i></th>
                                <th class="col-1">Due Date <i class="fa fa-sort-up" ></i></th>
                                <th class="col-1">Customer <i class="fa fa-sort-up" ></i></th>
                                <th class="col-1">Part Number <i class="fa fa-sort-up" ></i></th>
                                <th class="col-1">Part Descr <i class="fa fa-sort-up" ></i></th>
                                <th class="col-1">Customer PO <i class="fa fa-sort-up" ></i></th>
                                <th class="col-1">Quantity <i class="fa fa-sort-up" ></i></th>
                                <th class="col-1" id="ProductColumn">Product Code <i class="fa fa-sort-up" ></i></th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr id="rows">
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
        $("#clearSearch").on("click", function(){
            $("#myTable tr").filter(function(){
                $(this).show();
            })
        $("input:checkbox").not(this).prop("checked", this.checked = false);
        })
    });
    
    $(document).ready(function(){
        $("#selectAll").on("click", function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
            $("#myTable tr").show();
    });
    })

    $(document).ready(function(){
      $("#myInput").on("input", function() {
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

    $('#Headers th').click(function(){
    $(this).next('td').slideToggle('500');
    $(this).find('i').toggleClass('fa fa-sort-up fa fa-sort-down')
    });
    </script>
</body>
</html>