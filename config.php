<?php
$host = "localhost";   // Server lokal
$user = "root";        // Username default MySQL
$pass = "";            // Password default (kosong)
$db   = "absen";    // Nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
