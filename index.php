<?php
include_once('./Style and cleanup/Pictures.php');
include_once('./routes/home.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Technique Inc. Customer Job Schedule, Developer: Nathan Creger"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Customer Job Schedule</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script type="text/javascript" src="./tablesorter/jquery.tablesorter.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="../style and cleanup/table.css">
    <link rel="stylesheet" id="avia-google-webfont" href="//fonts.googleapis.com/css?family=Open+Sans:400,600%7CMontserrat" type="text/css" media="all">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="row">
                        <img class="img-responsive" src="./Logo/Technique Logo Cropped.jpg" alt="Techniqueinc Logo"/>
                    </div>
                    <div class="row">
                        <div class="display-4 mx-auto">Customer Job Schedule</div>
                    </div>
                        <div class="input-group mb-3 row mx-auto my-auto">
                            <input type="text" class="form-control" placeholder="Search.." id="myInput">
                            <button alt="Clear Search Button" id ="clearSearch" type="button" class="btn btn-outline-dark" onclick="document.querySelector('.form-control').value = ''"><i class="fa fa-times"aria-hidden="true"></i></button>
                            <div class="input-group-btn dropdown">
                                <button id="dd" type="button" class="btn btn-outline-dark dropdown-toggle font-weight-bold" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Product Codes<!--<span class="caret"></span>--></button>
                                <div class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dd">
                                    <?php product_Codes();?> 
                                </div>
                            </div>     
                        </div>
                        <div class="tableFixHead">
                            <table id="sortTable" class="table table-striped tablesorter table-sm">
                                <thead>
                                    <tr style="text-align: left header" id="Headers">
                                        <th class="col-2">Thumbnail <i class="fa fa-sort-up"></i></th>
                                        <th class="col-1">Technician <i class="fa fa-sort-up"></i></th>
                                        <th class="col-1">Job Number <i class="fa fa-sort-up"></i></th>
                                        <th class="col-1">Due Date <i class="fa fa-sort-up"></i></th>
                                        <th class="col-1">Customer <i class="fa fa-sort-up"></i></th>
                                        <th class="col-1">Part Number <i class="fa fa-sort-up"></i></th>
                                        <th class="col-1">Part Descr <i class="fa fa-sort-up"></i></th>
                                        <th class="col-1">Customer PO <i class="fa fa-sort-up"></i></th>
                                        <th class="col-1">Quantity <i class="fa fa-sort-up"></i></th>
                                        <th class="col-1" id="ProductColumn">Product Code <i class="fa fa-sort-up"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                        require("./includes/dbh.inc.php");
                                        require_once("./style and cleanup/pictures.php");
                                        Home();
                                    ?>
                                </tbody>
                            </table>
                    </div>
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
        $(".dropdown-menu li").show();
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
    const observer = lozad();
    observer.observe();
    </script>
</body>
</html>