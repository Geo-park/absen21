<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Absen Siswa</title>
    <link rel="stylesheet" href="tampilan.css" />
</head>

<body class="input">
    <div class="wrapper">
        <form action="proses-input.php" method="POST" enctype="multipart/form-data">
            <h1>ABSEN SISWA</h1>

            <div class="input-box">
                <input type="number" name="no_absen" placeholder="No Absen" required>
            </div>

            <div class="input-box">
                <input type="text" name="nama" placeholder="Nama" required>
            </div>

            <div class="input-box">
                <select name="kelas" required>
                    <option value="" disabled selected>Pilih Kelas</option>
                    <option value="A">Kelas A</option>
                    <option value="B">Kelas B</option>
                    <option value="C">Kelas C</option>
                </select>
            </div>

            <div class="input-box">
                <select name="jenis_kelamin" required>
                    <option value="" disabled selected>Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="input-box">
                <select name="kehadiran" required>
                    <option value="" disabled selected>Kehadiran</option>
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                </select>
            </div>

            <div class="input-box">
                <label for="foto">BUKTI KEHADIRAN:</label>
                <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png" required>
            </div>

            <div class="input-box">
                <button type="submit" name="kirim" class="tombol">Kirim</button>
            </div>

        </form>
    </div>
</body>
</html>
