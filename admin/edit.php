<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit();
}
?>
<?php
include 'config.php';

// Ambil data berdasarkan ID
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produk WHERE id=$id");
$data = $result->fetch_assoc();
?>

<h2>Edit Produk</h2>
<form action="update.php" method="POST">
  <!-- Hidden input agar ID tetap terbawa -->
  <input type="hidden" name="id" value="<?= $data['id'] ?>">
  
  <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>" required>
  <input type="number" name="harga" value="<?= $data['harga'] ?>" required>
  <button type="submit">Update</button>
</form>
<?php
include 'config.php';

$id    = $_POST['id'];
$nama  = $_POST['nama_produk'];
$harga = $_POST['harga'];

$sql = "UPDATE produk SET nama_produk='$nama', harga='$harga', WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: adminindex.php"); // kembali ke halaman utama setelah update
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
