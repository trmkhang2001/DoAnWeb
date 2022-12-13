<?php
$server = "localhost";
$user="root";
$pass="";
$database="shoe";
$root="3307";
$conn=mysqli_connect($server,$user,$pass,$database,$root);
mysqli_query($conn,'set names "utf8"');
?>