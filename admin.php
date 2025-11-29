<?php
include("config.php");

// Ambil data dari database
$query = mysqli_query($conn, "SELECT * FROM absen");

// Ringkasan
$total_hadir = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS total FROM absen WHERE kehadiran='Hadir'"))['total'];
$total_izin  = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS total FROM absen WHERE kehadiran='Izin'"))['total'];
$total_sakit = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS total FROM absen WHERE kehadiran='Sakit'"))['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kehadiran</title>

    <!-- HUBUNGKAN CSS -->
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="main-box">

    <div class="header-blue">
    </div>

    <div class="summary-container">

        <div class="summary-card">
            <div class="summary-card-icon">✔</div>
            <h4>Total Hadir</h4>
            <p><?= $total_hadir ?></p>
        </div>

        <div class="summary-card">
            <div class="summary-card-icon">❗</div>
            <h4>Total Izin</h4>
            <p><?= $total_izin ?></p>
        </div>

        <div class="summary-card">
            <div class="summary-card-icon">➕</div>
            <h4>Total Sakit</h4>
            <p><?= $total_sakit ?></p>
        </div>

    </div>

    <div class="table-title">Data Kehadiran Siswa</div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No Absen</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Kehadiran</th>
                    <th>Bukti Foto</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?= $row['no_absen'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['kelas'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['kehadiran'] ?></td>
                    <td><img class="bukti-img" src="uploads/<?= $row['foto'] ?>"></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <p class="total-text">Total: <?= mysqli_num_rows($query) ?> siswa</p>

</div>

</body>
</html>
