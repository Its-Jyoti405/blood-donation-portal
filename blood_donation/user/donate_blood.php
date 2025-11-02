<?php
session_start();
if(!isset($_SESSION['user'])) { header("Location: ../auth/user_login.php"); exit; }
include('../backend/db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donate Blood</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php include('../includes/navbar.php'); ?>
<div class="container">
  <h2>🩸 Donate Blood</h2>
  <form action="../backend/donate_blood_action.php" method="POST" class="form-card">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="text" name="blood_group" placeholder="Blood Group (e.g. A+)" required>
    <input type="text" name="contact" placeholder="Contact Number" required>
    <input type="date" name="donation_date" required>
    <textarea name="message" placeholder="Any note (optional)"></textarea>
    <button type="submit">Submit Donation</button>
  </form>
</div>
</body>
</html>
