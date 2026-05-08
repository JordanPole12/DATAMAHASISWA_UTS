<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="max-width: 900px; margin: auto;">
        <h2>Daftar Mahasiswa Aktif</h2>
        <a href="form.php" class="btn"> + Tambah Mahasiswa</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM mahasiswa");
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                       <img src="img/<?= $row['foto_profil'] ?>" class="img-thumbnail" width="50" height="50" style="object-fit: cover; border-radius: 4px;" alt="Foto">
                    </td>
                    <td><strong><?= $row['nim']; ?></strong></td>
                    <td><?= $row['nama_lengkap']; ?></td>
                    <td><?= $row['jurusan']; ?></td>
                    <td>
                        <a href="form.php?id=<?= $row['id']; ?>" class="link-edit">Edit</a> | 
                        <a href="hapus.php?id=<?= $row['id']; ?>" class="link-hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; } else { ?>
                    <tr><td colspan='6' style='text-align:center;'>Belum ada data.</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>