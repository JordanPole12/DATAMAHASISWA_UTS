<?php
include 'koneksi.php';
$id = $_GET['id'];

$q = mysqli_query($conn, "SELECT foto_profil FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_assoc($q);

if ($d['foto_profil'] != "" && $d['foto_profil'] != "default.jpg") {
    unlink("img/" . $d['foto_profil']);
}

mysqli_query($conn, "DELETE FROM mahasiswa WHERE id='$id'");
header("location:index.php");
?>