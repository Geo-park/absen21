<?php
require_once __DIR__ . '/../config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id        = $_POST['id'] ?? '';
    $kehadiran = $_POST['kehadiran'] ?? '';
    $tanggal   = $_POST['tanggal'] ?? '';

    if ($id === '' || $kehadiran === '' || $tanggal === '') {
        die("Data tidak lengkap!");
    }

    // UPDATE sesuai nama kolom tabel kamu
    $sql = "UPDATE absen 
            SET kehadiran = ?, tanggal = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $kehadiran, $tanggal, $id);

    if ($stmt->execute()) {
        header("Location: edit.php?status=success");
        exit;
    } else {
        echo "Gagal update: " . $conn->error;
    }

} else {
    echo "Request tidak valid!";
}
?>
