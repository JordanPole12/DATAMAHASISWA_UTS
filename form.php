<?php
include 'koneksi.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = ['nim' => '', 'nama_lengkap' => '', 'jurusan' => '', 'foto_profil' => ''];

if ($id) {
    $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Form <?= $id ? 'Edit' : 'Tambah'; ?> Mahasiswa</h2>
        <form action="proses.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <label>NIM</label>
            <input type="text" name="nim" value="<?= $data['nim']; ?>" required>
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= $data['nama_lengkap']; ?>" required>
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="<?= $data['jurusan']; ?>" required>
            <label>Foto Profil</label>
            <?php if ($data['foto_profil']) : ?>
                <div style="margin-bottom: 10px;">
                    <img src="img/<?= $data['foto_profil']; ?>" width="80">
                </div>
            <?php endif; ?>
            <input type="file" name="foto">
            <button type="submit" name="simpan" class="btn btn-save">Simpan</button>
            <a href="index.php">Batal</a>
        </form>
    </div>
</body>
</html>