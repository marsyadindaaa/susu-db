<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  // Username dan password default
  if ($user === "admin" && $pass === "1234") {
    $_SESSION['login'] = true;
    header("Location: adminindex.php");
    exit();
  } else {
    $error = "Username atau Password salah";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="style.css"> <!-- Pastikan ini sama dengan halaman lain -->
  <style>
    body {
      background-color: #fef9ed;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background-color: #fff;
      border: 2px solid #eee;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 320px;
    }

    .login-container h2 {
      margin-bottom: 20px;
      color: #1b2a49;
    }

    .login-container input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    .login-container button {
      width: 100%;
      padding: 10px;
      background-color:  #ff6600;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      color: white;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .login-container button:hover {
      background-color: #e88b00;
    }

    .error-msg {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Login Admin</h2>

    <?php if (isset($error)) : ?>
      <div class="error-msg"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>

</body>
</html>
