<?php
require_once __DIR__ . '/../config.php';

if(isset($_GET['id'])) {
    $id = intval($_GET['id']); // pastikan integer

    // Hapus data dari database
    $stmt = $conn->prepare("DELETE FROM absen WHERE id=?");
    $stmt->bind_param("i", $id);
    if($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: edit.php?msg=success");
        exit;
    } else {
        $stmt->close();
        $conn->close();
        die("Gagal menghapus data");
    }
} else {
    die("ID tidak ditemukan");
}
