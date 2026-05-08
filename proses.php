<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if ($foto != "") {
        $ext = pathinfo($foto, PATHINFO_EXTENSION);
        $foto_final = uniqid() . "." . $ext;
        move_uploaded_file($tmp, "img/" . $foto_final);
    } else {
        if ($id != "") {
            $q = mysqli_query($conn, "SELECT foto_profil FROM mahasiswa WHERE id='$id'");
            $d = mysqli_fetch_assoc($q);
            $foto_final = $d['foto_profil'];
        } else {
            $foto_final = "default.jpg"; 
        }
    }

    if ($id == "") {
        $sql = "INSERT INTO mahasiswa (nim, nama_lengkap, jurusan, foto_profil) VALUES ('$nim', '$nama', '$jurusan', '$foto_final')";
    } else {
        $sql = "UPDATE mahasiswa SET nim='$nim', nama_lengkap='$nama', jurusan='$jurusan', foto_profil='$foto_final' WHERE id='$id'";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Berhasil!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>