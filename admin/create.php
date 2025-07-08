<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit();
}
?>
<?php
include 'config.php';

$nama  = $_POST['nama_produk'];
$harga = $_POST['harga'];

$sql = "INSERT INTO produk (nama_produk, harga) VALUES ('$nama', '$harga')";

if ($conn->query($sql) === TRUE) {
  header("Location: adminindex.php"); // kembali ke halaman utama setelah simpan
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
