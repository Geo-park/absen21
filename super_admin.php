<?php
require_once __DIR__ . '/../config.php';

// Ambil daftar kelas unik
$kelas_result = $conn->query("SELECT DISTINCT kelas FROM absen ORDER BY kelas ASC");
$kelas_list = [];
while ($row = $kelas_result->fetch_assoc()) {
    $kelas_list[] = $row['kelas'];
}

// Statistik per kelas
$stats = [];
foreach ($kelas_list as $kelas) {
    // Total mahasiswa per kelas (unik)
    $total_mahasiswa = $conn->query("SELECT COUNT(DISTINCT nama) as total FROM absen WHERE kelas='$kelas'")->fetch_assoc()['total'];

    // Total absensi 7 hari terakhir
    $res = $conn->query("
        SELECT 
            COUNT(*) as total,
            SUM(CASE WHEN kehadiran='hadir' THEN 1 ELSE 0 END) as hadir
        FROM absen
        WHERE kelas='$kelas' AND tanggal BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()
    ")->fetch_assoc();

    $res['total_mahasiswa'] = $total_mahasiswa;
    $res['tidak_hadir'] = $res['total'] - $res['hadir'];
    $stats[$kelas] = $res;
}

// Ambil semua absensi lengkap
$absensi_result = $conn->query("SELECT * FROM absen ORDER BY tanggal DESC, id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Super Admin</title>
<link rel="stylesheet" href="../aset/css/base.css">
<link rel="stylesheet" href="../aset/css/sidebar.css">
<link rel="stylesheet" href="../aset/css/dashboard.css">
<link rel="stylesheet" href="../aset/css/table.css">
</head>
<body>
<div class="layout">

<aside class="sidebar">
    <div class="brand">
        <div class="logo sa">SA</div>
        <h1>Super Admin</h1>
    </div>
    <nav class="menu">
        <a class="active" href="super_admin.php">Dashboard</a>
        <a href="super_absensi.php">Data Absensi</a>
        <a href="super.php">Riwayat</a>
        <a href="edit.php">Edit Data</a>
        <hr>
        <a href="../logout.php">Logout</a>
    </nav>
</aside>

<main class="content">
<h2>Dashboard Super Admin</h2>

<!-- Tabel ringkas per kelas -->
<h3>Statistik Kelas 7 Hari Terakhir</h3>
<div class="table-wrapper">
    <table class="data-table">
        <thead>
            <tr>
                <th>Kelas</th>
                <th>Total Mahasiswa</th>
                <th>Total Absensi</th>
                <th>Hadir</th>
                <th>Tidak Hadir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($stats as $kelas => $data): ?>
                <tr>
                    <td><?= htmlspecialchars($kelas) ?></td>
                    <td><?= $data['total_mahasiswa'] ?></td>
                    <td><?= $data['total'] ?></td>
                    <td><?= $data['hadir'] ?></td>
                    <td><?= $data['tidak_hadir'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Cards per kelas -->
<div class="cards">
    <?php foreach ($stats as $kelas => $data): ?>
        <div class="card">
            <h3>Kelas <?= htmlspecialchars($kelas) ?></h3>
            <p>Total Mahasiswa: <?= $data['total_mahasiswa'] ?></p>
            <p>Total Absensi: <?= $data['total'] ?></p>
            <p>Hadir: <?= $data['hadir'] ?></p>
            <p>Tidak Hadir: <?= $data['tidak_hadir'] ?></p>
        </div>
    <?php endforeach; ?>
</div>

<h2>Data Absensi Lengkap</h2>
<div class="table-wrapper">
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>No Absen</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Kehadiran</th>
                <th>Foto</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($absensi_result->num_rows > 0): ?>
                <?php $no = 1; ?>
                <?php while($row = $absensi_result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['no_absen']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['kelas']) ?></td>
                        <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                        <td><?= htmlspecialchars($row['kehadiran']) ?></td>
                        <td>
                            <?php if(!empty($row['foto'])): ?>
                                <img src="../uploads/<?= htmlspecialchars($row['foto']) ?>" alt="Foto" style="width:50px;height:50px;object-fit:cover;border-radius:5px;">
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($row['tanggal']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="8" style="text-align:center;">Tidak ada data</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</main>
</div>
</body>
</html>
<?php $conn->close(); ?>
