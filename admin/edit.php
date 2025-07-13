<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit();
}

include("config.php");

// Proses update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id    = $_POST['id'];
  $nama  = $_POST['nama_produk'];
  $harga = $_POST['harga'];

  if (!empty($id) && !empty($nama) && !empty($harga)) {
    $sql = "UPDATE produk SET nama_produk='$nama', harga='$harga' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      header("Location: ../adminindex.php");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Input tidak boleh kosong!";
  }
} else {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM produk WHERE id=$id");

    if ($result && $result->num_rows > 0) {
      $data = $result->fetch_assoc();
    } else {
      echo "<p style='color:red'>❌ Data tidak ditemukan.</p>";
      exit();
    }
  } else {
    echo "<p style='color:red'>❌ ID tidak ditemukan di URL.</p>";
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #fffaf0;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 100%;
      max-width: 500px;
      background: #fff;
      margin: 80px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      border-top: 8px solid #ff6600;
    }

    h2 {
      text-align: center;
      color: #1b2a49;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      color: #333;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 25px;
      font-size: 16px;
      background-color: #ff6600;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #e65c00;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      color: #1b2a49;
      font-size: 14px;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Edit Produk</h2>
    <form method="POST">
      <input type="hidden" name="id" value="<?= $data['id'] ?>">

      <label for="nama_produk">Nama Produk</label>
      <input type="text" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>" required>

      <label for="harga">Harga</label>
      <input type="number" name="harga" id="harga" value="<?= $data['harga'] ?>" required>

      <button type="submit">Update</button>
    </form>
    <a href="../adminindex.php" class="back-link">← Kembali ke Dashboard</a>
  </div>

</body>
</html>
