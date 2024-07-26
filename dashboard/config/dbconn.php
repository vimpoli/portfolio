<?php
try {
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $db = 'bp_db';
   
   $conn = mysqli_connect($host, $user, $pass, $db);
   if (!$conn) {
      header('Location: ../dberror');
      exit(0);
   }
} catch (\Throwable $th) {
   echo $th->getMessage();
}
