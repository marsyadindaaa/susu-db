<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit();
}

include 'config.php';

$result = $conn->query("SELECT * FROM produk");

echo "<table border='1' cellpadding='10'>
<tr>
  <th>No</th>
  <th>Nama Produk</th>
  <th>Harga</th>
  <th>Aksi</th>
</tr>";

$no = 1;
while ($row = $result->fetch_assoc()) {
  echo "<tr>
    <td>" . $no++ . "</td>
    <td>" . $row['nama_produk'] . "</td>
    <td>" . $row['harga'] . "</td>
    <td>
      <a href='admin/edit.php?id=1" . $row['id'] . "'>Edit</a> |
      <a href='admin/delete.php?id=<?= $row['id'] ?>'>Hapus</a>
    </td>
  </tr>";
}
echo "</table>";
?>
