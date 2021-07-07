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
$stmt = mysqli_prepare($conn, "SELECT * FROM Job_Schedule;");
$stmt->execute();
$result = $stmt->get_result();


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
