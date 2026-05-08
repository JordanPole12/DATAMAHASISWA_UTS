<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademik_db"; // Pastikan nama DB ini benar di phpMyAdmin

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>