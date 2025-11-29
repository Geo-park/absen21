<?php
include("config.php");
$query = mysqli_query($conn, "SELECT * FROM absen");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Data Kehadiran</title>
<link rel="stylesheet" href="tampilan.css">
<link rel="stylesheet" href="tampilan-admin.css">
</head>

<body>

<div class="shape1"></div>
<div class="shape2"></div>

<!-- GANTI table-container menjadi table-wrapper -->
<div class="table-wrapper">
    
    <!-- GANTI h2 biasa menjadi class title-header -->
    <h2 class="title-header">Data Kehadiran Siswa</h2>

    <table>
        <thead>
            <tr>
                <th>No Absen</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Kehadiran</th>
                <th>Bukti Kehadiran</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?= $row['no_absen']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['kelas']; ?></td>
                    <td><?= $row['jenis_kelamin']; ?></td>
                    <td><?= $row['kehadiran']; ?></td>
                    <td>
                        <img src="uploads/<?= $row['foto']; ?>" class="bukti-img">
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- GANTI p biasa menjadi class total-text -->
    <p class="total-text">Total: <?= mysqli_num_rows($query); ?> absen</p>
</div>

</body>
</html>
