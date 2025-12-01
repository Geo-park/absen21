<?php
require_once __DIR__ . '/../config.php'; // koneksi ke database

// Ambil semua data absensi
$sql = "SELECT * FROM absen ORDER BY tanggal DESC, id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Data Absensi - Super Admin</title>

  <link rel="stylesheet" href="../aset/css/base.css">
  <link rel="stylesheet" href="../aset/css/sidebar.css">
  <link rel="stylesheet" href="../aset/css/table.css">
</head>

<body>
<div class="layout">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="brand">
      <div class="logo sa">SA</div>
      <h1>Super Admin</h1>
    </div>

    <nav class="menu">
      <a href="super_admin.php">Dashboard</a>
      <a class="active" href="super_absensi.php">Data Absensi</a>
      <a href="super.php">Riwayat</a>
      <a href="edit.php">Edit Data</a>
      <hr>
      <a href="../logout.php">Logout</a>
    </nav>
  </aside>

  <!-- CONTENT -->
  <main class="content">
    <h2>Data Absensi</h2>

    <div class="table-wrapper">
      <table class="data-table" id="absensiTable">
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
          <?php if ($result->num_rows > 0): ?>
            <?php $no = 1; ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['no_absen']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['kelas']) ?></td>
                <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                <td><?= htmlspecialchars($row['kehadiran']) ?></td>
                <td>
                  <?php if (!empty($row['foto'])): ?>
                    <img src="../uploads/<?= htmlspecialchars($row['foto']) ?>" alt="Foto" style="width:50px; height:50px; object-fit:cover; border-radius:5px;">
                  <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($row['tanggal']) ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="8" style="text-align:center;">Tidak ada data</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

</div>
</body>
</html>
<?php $conn->close(); ?>
