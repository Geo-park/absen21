<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen Siswa</title>
    <link rel="stylesheet" href="tampilan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<!-- SHAPES -->
<div class="shape1"></div>
<div class="shape2"></div>

<!-- MAIN CONTAINER -->
<div class="container">

    <!-- LEFT ILLUSTRATION -->
    <div class="illustration">
        <img src="contoh-gambar.png" alt="illustration">
    </div>

    <!-- RIGHT FORM -->
    <div class="form-card">
        <h1>ABSEN SISWA</h1>
        <p class="subtitle">Silakan isi data dengan lengkap dan benar</p>

        <form action="proses-input.php" method="POST" enctype="multipart/form-data">

            <div class="input-box">
                <label>No Absen</label>
                <div class="input-area">
                    <i class="fa-solid fa-hashtag"></i>
                    <input type="text" name="no_absen" placeholder="Masukkan No Absen" required>
                </div>
            </div>

            <div class="input-box">
                <label>Nama</label>
                <div class="input-area">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="nama" placeholder="Masukkan Nama" required>
                </div>
            </div>

            <div class="input-box">
                <label>Kelas</label>
                <div class="input-area">
                    <i class="fa-solid fa-building"></i>
                    <select name="kelas" required>
                        <option value="" disabled selected>Pilih Kelas</option>
                        <option value="A">Kelas A</option>
                        <option value="B">Kelas B</option>
                        <option value="C">Kelas C</option>
                    </select>
                </div>
            </div>

            <div class="input-box">
                <label>Jenis Kelamin</label>
                <div class="input-area">
                    <i class="fa-solid fa-venus-mars"></i>
                    <select name="jenis_kelamin" required>
                        <option value="" disabled selected>Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="input-box">
                <label>Kehadiran</label>
                <div class="input-area">
                    <i class="fa-solid fa-user-check"></i>
                    <select name="kehadiran" required>
                        <option value="" disabled selected>Kehadiran</option>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                    </select>
            </div>

            <!-- CUSTOM FILE UPLOAD -->
            <div class="input-box">
                <label>Bukti Kehadiran</label>
                <div class="upload-wrapper">
                    <i class="fa-solid fa-file-arrow-up"></i>
                    <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png,.pdf" required>
                </div>
            </div>

            <button class="btn-submit" value="kirim" name="kirim" type="submit">Daftar</button>

        </form>
    </div>

</div>

</body>
</html>
