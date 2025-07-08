<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit();
}
?>
<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM produk WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: adminindex.php"); // kembali setelah hapus
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
