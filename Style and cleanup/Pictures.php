<?php
include_once('./includes/dbh.inc.php');

if($result !== false){
  while($row = $result->fetch_assoc()){
  $files = scandir('./Thumbnails/');
  foreach ($files as $file) {
    if ($file !== "." && $file !== "..") {
      $name = strstr($file, '.png', TRUE);
      if($row['Part_Number']==$name){
          $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_number = ?;");
          $stmt->bind_param("ss", $file, $name);
          $files = scandir('./Thumbnails/');
          $name = strstr($file, '.png', TRUE);
          $stmt->execute();
         }
       }
     }
   }
 }
?>                           
