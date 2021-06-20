<?php
  include_once('./includes/dbh.inc.php');
  $sql = 'SELECT Files from SaveFiles WHERE FileID ='';';
  if(($result = sqlsrv_query($conn, $sql))!==false){
    while ($row = sqlsrv_fetch_array($result)){
        //$image = base64_encode(pack('H*',$image));
        //THIS IS HOW YOU ECHO A STORED IMAGE FROM THE DATABASE
        echo '<img src="data:image/png;base64,' .base64_encode($row['Files']). '">';
      }
    }

    /*
    while ($row = sqlsrv_fetch_array($result)){
        //echo '<img src="$row["Files"]" alt="Firewatch" ./>';
        //echo 'img src="C:\Users\nathanc\Pictures\Saved Pictures\Firewatch.jpg" alt="Filed_firewatch"/>';
    }
  }
  */
?>