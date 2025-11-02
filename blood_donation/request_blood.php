<?php
include('partials/header.php');
include('backend/db_connect.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?type=user");
    exit;
}

$group = $_GET['group'] ?? '';
$msg = '';

if (isset($_POST['submit'])) {
    $blood_group = $_POST['blood_group'];
    $units = (int)$_POST['units'];
    $user_id = $_SESSION['user_id'];

    $conn->query("INSERT INTO blood_requests (user_id, blood_group, units_requested) VALUES ('$user_id', '$blood_group', '$units')");
    $msg = "<div class='alert alert-success mt-3'>Blood request submitted successfully. Wait for admin approval.</div>";
}
?>

<div class="container mt-5" style="max-width:500px;">
  <h3 class="text-danger fw-bold text-center mb-3">🩸 Request Blood</h3>
  <?php echo $msg; ?>
  <form method="POST">
    <div class="mb-3">
      <label>Blood Group</label>
      <div class="mb-3">
  <select name="blood_group" class="form-control" required>
    <option value="">-- Select Blood Group --</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
  </select>
</div>

    </div>
    <div class="mb-3">
      <label>Units Required</label>
      <input type="number" name="units" class="form-control" required min="1">
    </div>
    <button type="submit" name="submit" class="btn btn-danger w-100">Submit Request</button>
  </form>
</div>

<?php include('partials/footer.php'); ?>
