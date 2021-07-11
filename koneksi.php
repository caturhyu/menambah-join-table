<?php
$host     = "localhost";
$user     = "root";
$password = "cwwahyudi";
$database = "catur_wahyudi_311810945";

$hari_ini = date("Y-m-d");

$koneksi   = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno($koneksi)) {
   //this for show failed

   echo "Failed to connect to MySQL: " . mysqli_connect_error();

}
?>
