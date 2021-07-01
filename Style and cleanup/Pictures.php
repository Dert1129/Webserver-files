<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}  
// Enter your Directry/Folder Name I have Given Folder Name As Images
$sql = "SELECT Part_Number FROM Job_Schedule;";
$result = mysqli_query($conn, $sql);


if($result !== false){
  while($row = mysqli_fetch_assoc($result)){
  $files = scandir('./Thumbnails/');
  foreach ($files as $file) {
    if ($file !== "." && $file !== "..") {
      $name = strstr($file, '.png', TRUE);
      if($row['Part_Number']==$name){
        $sql = "UPDATE Job_Schedule
        SET Thumbnail = '$file' WHERE Part_Number = '$name';";
          mysqli_query($conn, $sql);
         }
       }
     }
   }
 }
?>                           
