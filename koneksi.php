<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "ice";

$koneksi = mysqli_connect($hostname, $username, $password, $database_name);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>