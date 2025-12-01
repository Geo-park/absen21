<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen Siswa</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        /* Background putih polos */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #ffffff;
            overflow-x: hidden;
        }

        /* Layout utama */
        .container {
            width: 90%;
            margin: auto;
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .illustration img {
            width: 480px;
        }

        /* Kartu form */
        .form-card {
            width: 550px;
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }

        .form-card h1 {
            text-align: center;
            margin: 0;
            font-size: 32px;
            font-weight: 700;
        }

        .subtitle {
            text-align: center;
            margin-top: 5px;
            margin-bottom: 25px;
            color: #6b6b6b;
        }

        /* Input styling */
        .input-area,
        .upload-wrapper {
            display: flex;
            align-items: center;
            border: 1.8px solid #d5d9e4;
            border-radius: 12px;
            padding: 10px 15px;
            background: #f6f7fa;
        }

        .input-area i,
        .upload-wrapper i {
            margin-right: 10px;
            color: #6c8df5;
            font-size: 18px;
        }

        .input-area input,
        .input-area select {
            width: 100%;
            border: none;
            background: none;
            outline: none;
            font-size: 14px;
        }

        .input-box {
            margin-bottom: 18px;
        }

        .input-box label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
        }

        /* Upload */
        .upload-wrapper {
            position: relative;
            gap: 10px;
        }

        #file-name {
            flex: 1;
            font-size: 14px;
            color: #777;
            font-style: italic;
        }

        input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        /* Tombol submit */
        .btn-submit {
            width: 100%;
            background: #6c8df5;
            border: none;
            color: white;
            padding: 15px 0;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: #5677e6;
        }

    </style>
</head>

<body>

<div class="container">

    <!-- Gambar ilustrasi -->
    <div class="illustration">
        <img src="contoh-gambar.png" alt="illustration">
    </div>

    <!-- Form -->
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
                        <option disabled selected>Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>

            <!-- ✅ Tambahan KEHADIRAN -->
            <div class="input-box">
                <label>Kehadiran</label>
                <div class="input-area">
                    <i class="fa-solid fa-user-check"></i>
                    <select name="kehadiran" required>
                        <option disabled selected>Kehadiran</option>
                        <option>hadir</option>
                        <option>izin</option>
                        <option>sakit</option>
                    </select>
                </div>
            </div>
            <!-- END Tambahan -->

            <!-- Upload -->
            <div class="input-box">
                <label>Bukti Kehadiran</label>

                <div class="upload-wrapper">
                    <i class="fa-solid fa-file-arrow-up"></i>

                    <span id="file-name">Pilih file jpg/png/pdf...</span>

                    <input type="file"
                           id="foto"
                           name="foto"
                           accept=".jpg,.jpeg,.png,.pdf"
                           required>
                </div>
            </div>

            <button class="btn-submit" value="kirim" name="kirim" type="submit">Daftar</button>

        </form>

    </div>
</div>

<script>
    const fileInput = document.getElementById("foto");
    const fileName = document.getElementById("file-name");

    fileInput.addEventListener("change", function () {
        fileName.textContent = fileInput.files.length > 0 
            ? fileInput.files[0].name 
            : "Pilih file jpg/png/pdf...";
    });
</script>

</body>
</html>
