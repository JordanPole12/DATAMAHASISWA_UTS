document.getElementById('mhsForm').onsubmit = function(e) {
    let nim = document.getElementById('nim').value.trim();
    let nama = document.getElementById('nama').value.trim();
    let jurusan = document.getElementById('jurusan').value.trim();
    let foto = document.getElementById('foto');

    // Cek field kosong
    if (nim === "" || nama === "" || jurusan === "") {
        alert("Semua field teks wajib diisi!");
        e.preventDefault();
        return;
    }

    // Validasi file jika ada yang diupload
    if (foto.files.length > 0) {
        let file = foto.files[0];
        let fileSize = file.size / 1024 / 1024; // MB
        let fileType = file.type;
        let allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

        if (!allowedTypes.includes(fileType)) {
            alert("Tipe file harus JPG, JPEG, atau PNG!");
            e.preventDefault();
        } else if (fileSize > 2) {
            alert("Ukuran file maksimal 2 MB!");
            e.preventDefault();
        }
    } else if (document.getElementsByName('id')[0].value === "") {
        // Jika tambah data baru tapi foto kosong
        alert("Foto wajib diunggah untuk data baru!");
        e.preventDefault();
    }
};