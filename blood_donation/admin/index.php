<?php
session_start();
include('../backend/db_connect.php');

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Query using correct field name
    $result = $conn->query("SELECT * FROM admins WHERE username='$username'");

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Since your DB stores plain password (not hashed)
        if ($password === $row['password']) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['username'];

            header('Location: dashboard.php');
            exit;
        } else {
            $error = "❌ Invalid password!";
        }
    } else {
        $error = "❌ Admin not found!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <div class="login-container">
    <h2>🩸 Admin Login</h2>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
      <input type="text" name="username" placeholder="Admin Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button name="login" type="submit">Login</button>
    </form>
  </div>
</body>
</html>
