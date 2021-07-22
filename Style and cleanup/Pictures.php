<?php
include_once('./includes/dbh.inc.php');
$stmt = $conn->prepare("SELECT Part_Number FROM Job_Schedule");
$stmt->execute();
$result = $stmt->get_result();

if($result !== false){
  while($row = $result->fetch_assoc()){
  $files = scandir('./Thumbnails/');
  foreach ($files as $file) {
    if ($file !== "." && $file !== "..") {
      $name = strstr($file, '.png', TRUE);
      if($row['Part_Number']==$name){
          $stmt = $conn->prepare("UPDATE Job_Schedule SET Thumbnail = ? WHERE Part_Number = ?;");
          $stmt->bind_param("ss", $file, $name);
          $files = scandir('./Thumbnails/');
          $stmt->execute();
         }
       }
     }
   }
 }
?>                           
