<?php
require_once __DIR__ . '/../config.php';

// Ambil semua data absensi
$sql = "SELECT * FROM absen ORDER BY tanggal DESC, id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Absensi</title>

  <link rel="stylesheet" href="../aset/css/base.css">
  <link rel="stylesheet" href="../aset/css/sidebar.css">
  <link rel="stylesheet" href="../aset/css/table.css">
  <link rel="stylesheet" href="../aset/css/form.css">
  <link rel="stylesheet" href="../aset/css/edit_data.css">
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
        <a href="super_absensi.php">Data Absensi</a>
        <a href="super.php">Riwayat</a>
        <a class="active" href="edit.php">Edit Data</a>
        <hr>
        <a href="../logout.php">Logout</a>
    </nav>
</aside>

<!-- CONTENT -->
<main class="content">
<h2>Edit Data Absensi</h2>

<div class="table-wrapper">
  <table class="data-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Kehadiran</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php if ($result->num_rows > 0): ?>
        <?php $no = 1; ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <td><?php echo htmlspecialchars($row['kelas']); ?></td>
            <td><?php echo htmlspecialchars($row['kehadiran']); ?></td>
            <td><?php echo htmlspecialchars($row['tanggal']); ?></td>
            <td>
              <button 
                onclick="openModal(
                  '<?php echo $row['id']; ?>',
                  '<?php echo $row['kehadiran']; ?>',
                  '<?php echo $row['tanggal']; ?>'
                )">Edit</button>

              |
              
              <a href="hapus.php?id=<?php echo $row['id']; ?>" 
                 onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="6" style="text-align:center;">Tidak ada data</td></tr>
      <?php endif; ?>

    </tbody>
  </table>
</div>
</main>
</div>

<!-- MODAL POPUP -->
<div id="editModal" class="modal">
  <div class="modal-content">

    <span class="close-btn" onclick="closeModal()">&times;</span>

    <h2>Edit Absensi</h2>

    <form id="editForm" method="post" action="edit_data.php">

      <input type="hidden" name="id" id="edit-id">

      <label>Kehadiran:</label>
      <select name="kehadiran" id="edit-kehadiran">
        <option value="hadir">Hadir</option>
        <option value="izin">Izin</option>
        <option value="sakit">Sakit</option>
      </select>

      <label>Tanggal:</label>
      <input type="date" name="tanggal" id="edit-tanggal">

      <button type="submit" class="btn-submit">Update</button>
    </form>

  </div>
</div>

<script src="../aset/modal.js"></script>

</body>
</html>

<?php $conn->close(); ?>
