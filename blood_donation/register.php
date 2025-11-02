<?php
include('partials/header.php');
include('backend/db_connect.php');

if (isset($_POST['register'])) {
  $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
  $email    = mysqli_real_escape_string($conn, $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $blood    = mysqli_real_escape_string($conn, $_POST['blood_group']);

  $check = $conn->query("SELECT * FROM users WHERE email='$email'");
  if ($check->num_rows > 0) {
      $msg = "<div class='alert alert-danger'>Email already registered!</div>";
  } else {
      $sql = "INSERT INTO users (fullname,email,password,blood_group) VALUES ('$fullname','$email','$password','$blood')";
      if ($conn->query($sql)) {
          header("Location: login.php?registered=1");
          exit;
      } else {
          $msg = "<div class='alert alert-danger'>Registration failed!</div>";
      }
  }
}
?>

<div class="container mt-5" style="max-width:500px;">
  <h3 class="text-danger fw-bold text-center mb-4">🩸 User Registration</h3>
  <?php if (!empty($msg)) echo $msg; ?>
  <form method="POST">
    <div class="mb-3">
      <label>Full Name</label>
      <input type="text" name="fullname" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Blood Group</label>
      <select name="blood_group" class="form-select" required>
        <option value="">Select</option>
        <option>A+</option><option>A-</option><option>B+</option><option>B-</option>
        <option>O+</option><option>O-</option><option>AB+</option><option>AB-</option>
      </select>
    </div>
    <button type="submit" name="register" class="btn btn-danger w-100">Register</button>
    <p class="text-center mt-3">Already have an account? <a href="login.php?type=user" class="text-danger">Login</a></p>
  </form>
</div>

<?php include('partials/footer.php'); ?>
