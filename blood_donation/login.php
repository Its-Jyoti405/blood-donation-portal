<?php
session_start();
include('backend/db_connect.php'); // make sure path is correct

// initialize defaults so no "undefined variable" warnings
$type = $_GET['type'] ?? 'user';
$message = "";
$identifier = ""; // will hold email (user) or username (admin)

// Process login when form submitted
if (isset($_POST['login'])) {
    // get and sanitize posted identifier and password
    $identifier = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'] ?? '';

    if ($type === 'user') {
        // User login (users table uses email and hashed password)
        $sql = "SELECT * FROM users WHERE email='$identifier' LIMIT 1";
        $result = $conn->query($sql);

        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // success
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['fullname'];
                header("Location: user_dashboard.php");
                exit;
            } else {
                $message = "<div class='alert alert-danger'>Incorrect password!</div>";
            }
        } else {
            $message = "<div class='alert alert-danger'>No user found with that email!</div>";
        }
    } else {
        // Admin login (admins table: username, password stored as plain text in your DB)
        // We assume admins table column is `username`
        $sql = "SELECT * FROM admins WHERE username='$identifier' LIMIT 1";
        $result = $conn->query($sql);

        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Because your admins currently store plaintext (admin123), compare directly.
            // If you later hash admin passwords, switch to password_verify().
            if ($password === $row['password']) {
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_name'] = $row['username'];
                header("Location: admin/dashboard.php");
                exit;
            } else {
                $message = "<div class='alert alert-danger'>Incorrect password!</div>";
            }
        } else {
            $message = "<div class='alert alert-danger'>Admin not found!</div>";
        }
    }
}
?>
<!-- include header after logic so header can use session values if needed -->
<?php include('partials/header.php'); ?>

<div class="container mt-5" style="max-width:400px;">
  <h3 class="text-danger text-center fw-bold mb-4">
    <?php echo ($type === 'admin') ? "👨‍💼 Admin Login" : "🩸 User Login"; ?>
  </h3>

  <?php
  if (isset($_GET['registered'])) echo "<div class='alert alert-success'>Registration successful! Please login.</div>";
  echo $message;
  ?>

  <form method="POST">
    <div class="mb-3">
      <label><?php echo ($type === 'admin') ? 'Username' : 'Email'; ?></label>
      <!-- show previously entered identifier so user doesn't have to retype -->
      <input type="text" name="email" class="form-control" required value="<?= htmlspecialchars($identifier) ?>">
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" name="login" class="btn btn-danger w-100">Login</button>
    <?php if ($type === 'user'): ?>
      <p class="text-center mt-3">Don't have an account? <a href="register.php" class="text-danger">Register</a></p>
    <?php endif; ?>
  </form>
</div>

<?php include('partials/footer.php'); ?>
