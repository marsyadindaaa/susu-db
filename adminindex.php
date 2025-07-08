<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Susu Murni D'susu</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>
<body>

  <!-- Header -->
  <header>
    <div class="logo">Admin<span>Susu Murni</span></div>
    <nav>
      <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="indextamu.php">Beranda</a></li>
      </ul>
    </nav>
  </header>

  <!-- Form Tambah Produk -->
  <section id="form-produk" style="padding: 20px;">
    <h2>Tambah Produk Baru</h2>
    <form action="admin/create.php" method="POST">
      <input type="text" name="nama_produk" placeholder="Nama Produk" required>
      <input type="number" name="harga" placeholder="Harga (Rp)" required>
      <button type="submit">Simpan</button>
    </form>
  </section>

  <!-- Tampilkan Data Produk dari Database -->
  <section id="data-produk" style="padding: 20px;">
    <h2>Data Produk Dinamis</h2>
    <?php include 'admin/read.php'; ?>
  </section>

  <!-- JavaScript -->
  <script src="main.js"></script>
</body>
</html>
