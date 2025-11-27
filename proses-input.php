<?php
include("config.php");

// Tampilkan semua error untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["kirim"])){

    $no_absen = intval($_POST['no_absen']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kehadiran = $_POST['kehadiran'];

    // Upload file foto
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];
        $folder = "uploads/";

        // Buat folder jika belum ada
        if(!is_dir($folder)){
            mkdir($folder, 0777, true);
        }

        // Sanitasi nama file agar aman
        $foto = str_replace(' ', '_', $foto);                       // ganti spasi dengan underscore
        $foto = preg_replace('/[^A-Za-z0-9_\-\.]/', '', $foto);    // hapus karakter aneh

        // Validasi ekstensi file
        $allowed = ['jpg','jpeg','png'];
        $ext = pathinfo($foto, PATHINFO_EXTENSION);
        if(!in_array(strtolower($ext), $allowed)){
            die("Hanya file JPG, JPEG, PNG yang diperbolehkan!");
        }

        // Pindahkan file ke folder uploads
        if(move_uploaded_file($tmp, $folder.$foto)){
            // Simpan data ke database
            $sql = "INSERT INTO absen (no_absen, nama, kelas, jenis_kelamin, kehadiran, foto)
                    VALUES ($no_absen, '$nama', '$kelas', '$jenis_kelamin', '$kehadiran', '$foto')";

            if(mysqli_query($conn, $sql)){
                // Redirect ke halaman daftar absen
                header("Location: login.php?pesan=success");
                exit;
            } else {
                die("Error database: " . mysqli_error($conn));
            }
        } else {
            die("Gagal upload foto! Pastikan folder uploads bisa ditulis.");
        }

    } else {
        die("File foto belum dipilih atau terjadi error saat upload!");
    }

} else {
    // Jika akses langsung tanpa submit form
    header("Location: input.php");
    exit;
}
?>
