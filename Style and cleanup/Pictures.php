<?php
	function Insert_All_Images(){
		include_once('../includes/dbh.inc.php');
		$sql = "UPDATE PHP_Connect
		SET Thumbnail = 
			(SELECT  BulkColumn FROM OPENROWSET(BULK  N'Thumbnails/11.54.022.706.046 D-00.png', SINGLE_BLOB) AS Thumbnail);";

		if(($result = sqlsrv_query($conn, $sql))!==false){
			while($row = sqlsrv_fetch_array($result)){
				echo $row['name'];
				echo $row['ID'];
			}
		}else{
			die(print_r(sqlsrv_errors(), true));
		}
	}
Insert_All_Images();
?>