<?php
function Update_Images(){
 require("../includes/dbh.inc.php");
 // Enter your Directry/Folder Name I have Given Folder Name As Images
 $sql = "SELECT Part_Number FROM Job_Schedule;";
 if(($result = sqlsrv_query($conn,$sql))!== false){
   while($row = sqlsrv_fetch_array($result)){
   $files = scandir('../Thumbnails/');
   foreach ($files as $file) {
     if ($file !== "." && $file !== "..") {
       $name = strstr($file, '.png', TRUE);
       if($row['Part_Number']==$name){
         $sql = "UPDATE Job_Schedule
         SET Thumbnail = 
           (SELECT  BulkColumn FROM OPENROWSET(BULK  N'//tiws07/dwg/Mfg Mtg/Nathan/Webserver files/Thumbnails/$file', SINGLE_BLOB) AS Thumbnail)
           WHERE Part_Number = '$name';";
           sqlsrv_query($conn, $sql);
           echo "Query Successfull!";
          }
        }
      }
    }
  }
}
?>                           
