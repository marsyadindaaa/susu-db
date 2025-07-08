<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit();
}
?>
<?php
include 'config.php';

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data and trim extra spaces
    $nama  = trim($_POST['nama_produk']);
    $harga = $_POST['harga'];

    // Validate input
    if (empty($nama) || empty($harga)) {
        echo "<script>alert('Nama produk dan harga harus diisi!'); window.history.back();</script>";
        exit();
    }

    // Use a prepared statement for security
    $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga) VALUES (?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the parameters (s = string, i = integer)
    $stmt->bind_param("si", $nama, $harga);

    // Execute and check for errors
    if ($stmt->execute()) {
        // Redirect to admin index after successful insertion
        echo "<script>alert('Produk berhasil ditambahkan!'); window.location.href='../adminindex.php';</script>";
        exit();
    } else {
        // Provide a user-friendly error message
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If not POST request, redirect back
    header("Location: ../adminindex.php");
    exit();
}
?>
