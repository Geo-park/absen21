<?php
require_once __DIR__ . '/../config.php';

$nama = $_GET['nama'] ?? '';
$tgl_awal = $_GET['tgl_awal'] ?? '';
$tgl_akhir = $_GET['tgl_akhir'] ?? '';
$riwayat = [];

// Ambil daftar nama mahasiswa unik
$mahasiswa = $conn->query("SELECT DISTINCT nama FROM absen ORDER BY nama ASC");

// Ambil riwayat jika nama dan tanggal tersedia
if ($nama !== '' && $tgl_awal !== '' && $tgl_akhir !== '') {
    $stmt = $conn->prepare("
        SELECT * FROM absen 
        WHERE nama = ? 
          AND tanggal BETWEEN ? AND ?
        ORDER BY tanggal DESC, id DESC
    ");
    $stmt->bind_param("sss", $nama, $tgl_awal, $tgl_akhir);
    $stmt->execute();
    $riwayat = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard / Riwayat - Super Admin</title>
<link rel="stylesheet" href="../aset/css/base.css">
<link rel="stylesheet" href="../aset/css/sidebar.css">
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
        <a class="active" href="super.php">Dashboard</a>
        <a href="super_absensi.php">Data Absensi</a>
        <a href="super.php">Riwayat</a>
        <a href="edit.php">Edit Data</a>
        <hr>
        <a href="../logout.php">Logout</a>
    </nav>
</aside>

<main class="content">
<h2>Riwayat Absensi</h2>

<form method="get" action="">
    <label for="nama">Pilih Mahasiswa:</label>
    <select name="nama" id="nama" required>
        <option value="">-- Pilih Mahasiswa --</option>
        <?php while($row = $mahasiswa->fetch_assoc()): ?>
            <option value="<?= htmlspecialchars($row['nama']) ?>" <?= ($row['nama'] == $nama) ? 'selected' : '' ?>>
                <?= htmlspecialchars($row['nama']) ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="tgl_awal">Tanggal Awal:</label>
    <input type="date" name="tgl_awal" id="tgl_awal" value="<?= htmlspecialchars($tgl_awal) ?>" required>

    <label for="tgl_akhir">Tanggal Akhir:</label>
    <input type="date" name="tgl_akhir" id="tgl_akhir" value="<?= htmlspecialchars($tgl_akhir) ?>" required>

    <button type="submit">Lihat Riwayat</button>
</form>

<?php if ($nama !== '' && $tgl_awal !== '' && $tgl_akhir !== ''): ?>
    <h3>Riwayat Absensi: <?= htmlspecialchars($nama) ?> (<?= htmlspecialchars($tgl_awal) ?> s/d <?= htmlspecialchars($tgl_akhir) ?>)</h3>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kehadiran</th>
                    <th>Tanggal</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($riwayat) > 0): ?>
                    <?php $no = 1; ?>
                    <?php foreach($riwayat as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['kehadiran']) ?></td>
                            <td><?= htmlspecialchars($row['tanggal']) ?></td>
                            <td>
                                <?php if (!empty($row['foto'])): ?>
                                    <img src="../uploads/<?= htmlspecialchars($row['foto']) ?>" alt="Foto" style="width:50px;height:50px;object-fit:cover;border-radius:5px;">
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" style="text-align:center;">Tidak ada riwayat dalam rentang tanggal ini</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

</main>
</div>
</body>
</html>
<?php $conn->close(); ?>
