<?php
include 'config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM produk WHERE id=$id");
header("Location: adminindex.php"); // ganti sesuai file utama
exit();
?>
