<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  // Username dan password default
  if ($user === "admin" && $pass === "1234") {
    $_SESSION['login'] = true;

    // Redirect ke halaman dashboard admin (pastikan file ini ada)
    header("Location: adminindex.php");
    exit();
  } else {
    $error = "Username atau Password salah";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin-top: 100px;
    }
    input {
      padding: 8px;
      margin: 5px;
    }
    button {
      padding: 8px 16px;
    }
  </style>
</head>
<body>
  <h2>Login Admin</h2>

  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

  <form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>
</body>
</html>
