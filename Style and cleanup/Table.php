<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>All Job Information</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #666;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
	margin: 30px 0;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.pagination {
    margin: 10px 0 5px;
}
.pagination li a {
    border: none;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 4px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}
.pagination li.active a, .pagination li.active a.page-link {
    background: #59bdb3;
}
.pagination li.active a:hover {        
    background: #45aba0;
}
.pagination li:first-child a, .pagination li:last-child a {
    padding: 0 10px;
}
.pagination li.disabled a {
    color: #ccc;
}
.pagination li i {
    font-size: 17px;
    position: relative;
    top: 1px;
    margin: 0 2px;
}
.table-image {
  td, th {
    vertical-align: middle;
  }
}


</style>
</head>
<body>
<base href="localhost:8080"/>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">JSDID</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Technician</th>
                        <th scope="col">Job Number</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Part Number</th>
                        <th scope="col">Part Description</th>
                        <th scope="col">Qty</th>
                    </tr>
                </thead>
                <tbody>
                    </tr>
                    <td class="w-25">
                    <?php
                        include_once('./style and cleanup/pictures.php');
                        include_once('./PHP SQL Queries/Master_Schedule.php');
                        Master_Schedule();
                        ?>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>     
</body>
</html>