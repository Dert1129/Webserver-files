<?php
include_once('./routes/Tube_schedule.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta name='author' content='Technique Inc. Customer Job Schedule, Developer: Nathan Creger'/>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=yes'>
    <title>Tube Laser Schedule</title>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../style and cleanup/table.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js'></script>
    <link rel='stylesheet' id='avia-google-webfont' href='//fonts.googleapis.com/css?family=Open+Sans:400,600%7CMontserrat' type='text/css' media='all'>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.bootstrap_4.min.css'/>
    <script src='//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js'></script>
</head>
<body>
    <section>
        <div class='container-fluid'>
            <div class='table-responsive'>
                <div class='table-wrapper'>
                    <div class='row'>
                        <img class='img-responsive' src='./Logo/Technique Logo Cropped.jpg' alt='Techniqueinc Logo'/>
                        <iframe class='ml-auto' src='./update.html' width='300px' height='100px' frameborder=0></iframe>
                    </div>
                    <div class='row'>
                        <div class='display-4 mx-auto'>Tube Laser Schedule</div>
                    </div>
                    <div class='input-group mb-3 row mx-auto my-auto'>
                            <input type='text' class='form-control' placeholder='Search..' id='myInput'>
                            <button alt="Clear Search Button" id ="clearSearch" type="button" class="btn btn-outline-dark" onclick="document.querySelector('.form-control').value = ''"><i class='fa fa-times' aria-hidden='true'></i></button>
                            <div class='input-group-btn dropdown'>
                                <button id='dd' type='button' class='btn btn-outline-dark dropdown-toggle font-weight-bold' data-toggle='dropdown' aria-haspopup='true'aria-expanded='true'>Schedules<span class='caret'></span></button>
                                <div class='dropdown-menu checkbox-menu allow-focus' aria-labelledby='dd'>
                                    <a class="dropdown-item" href="http://localhost:8080">Customer Job Schedule</a>
                                    <a class="dropdown-item" href="http://localhost:8080/Department/brake.php">Brake & Baltec Schedule</a>
                                    <a class="dropdown-item" href="http://localhost:8080/Department/Tube.php">Brake & Baltec Schedule</a>
                                    <a class="dropdown-item" href="http://localhost:8080/Department/spacegear.php">Spacegear Schedule</a>
                                </div>
                            </div>
                        </div>
                        <div class='tableFixHead'>
                            <table id='sortTable' class='table2excel table table-striped tablesorter table-sm'>
                                <thead>
                                    <tr style='text-align: left header' id='Headers'>   
                                        <th class='col-1'>Technician</th>
                                        <th class='col-1'>Job Number</th>
                                        <th class='col-1'>Due Date</th>
                                        <th class='col-1'>Customer</th>
                                        <th class='col-1'>Part Number</th>
                                        <th class='col-1'>Status</th>
                                        <th class="col-1">Master Job Number</th>
                                        <th class='col-1'>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody id='myTable'>
                                    <?php
                                        include_once('./includes/dbh.inc.php');
                                        Tube();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <button class='btn btn-outline-dark' id='export'>Export to Excel</button>
            <button class='btn btn-outline-dark' id='print' onclick='myApp.printTable()'>Print</button>
        </div>
    </section>
    <script>
    $(document).ready(function(){
        $('#sortTable').tablesorter({
            theme: 'bootstrap'
        });
    });
    $(document).ready(function(){
        $('#clearSearch').on('click', function(){
            $('#myTable tr').filter(function(){
                $(this).show();
            })
        $('input:checkbox').not(this).prop('checked', this.checked = false);
        $('.dropdown-menu li').show();
        })
    });
    $(document).ready(function(){
        $('#selectAll').on('click', function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
            $('#myTable tr').show();
    	});
    });
    $(document).ready(function(){
      $('#myInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#myTable tr').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    $(document).on('click', '.allow-focus', function (e) {
      e.stopPropagation();
    });
    $(document).ready(function(){
        $('.name').on('click', function() {
            name_list = []
            $('#myTable tr').hide()
            var flag = 1
            $('input:checkbox[name=name]:checked').each(function(){
  		        flag = 0;
    	        var value = $(this).val().toLowerCase();
      	        $('#myTable tr').filter(function() {
                    if($(this).text().toLowerCase().indexOf(value) > -1)
            	            $(this).show()
    	            });
 	        });
        if(flag == 1)
        	$('#myTable tr').show()
        });
    });
    $(document).ready(function(){
        $('#export').on('click',function(){
            $('.table2excel').table2excel({
                name: 'Job Scheduling Information',
                filename: 'Job_Schedule.xls',
                preserveColors: true,
                exclude_links: false,
                exclude_img: true
            });
        });
    });
    var myApp = new function () {
        this.printTable = function () {
            var tab = document.getElementById('sortTable');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(sortTable.outerHTML);
            win.document.close();
            win.print();
        }
    }
    </script>
</body>
</html>