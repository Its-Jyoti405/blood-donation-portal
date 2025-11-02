<?php
include('partials/header.php');
include('backend/db_connect.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?type=user");
    exit;
}

$event_id = $_GET['id'] ?? '';
$msg = '';

if (isset($_POST['register'])) {
    $user_id = $_SESSION['user_id'];
    $role = $_POST['role'];
    $conn->query("INSERT INTO event_registrations (user_id, event_id, role)
                  VALUES ('$user_id', '$event_id', '$role')");
    $msg = "<div class='alert alert-success mt-3'>Registration successful! Pending approval.</div>";
}

$event = $conn->query("SELECT * FROM events WHERE id='$event_id'")->fetch_assoc();
?>

<div class="container mt-5" style="max-width:500px;">
  <h3 class="text-danger fw-bold text-center mb-4">🎟 Register for Event</h3>

  <div class="card p-3 mb-4 border-danger">
    <h5 class="fw-bold text-danger"><?= $event['event_name']; ?></h5>
    <p><strong>Date:</strong> <?= $event['event_date']; ?></p>
    <p><strong>Location:</strong> <?= $event['location']; ?></p>
  </div>

  <?php echo $msg; ?>

  <form method="POST">
    <div class="mb-3">
      <label>Register As</label>
      <select name="role" class="form-select" required>
        <option value="">Select Role</option>
        <option>Donor</option>
        <option>Volunteer</option>
      </select>
    </div>
    <button type="submit" name="register" class="btn btn-danger w-100">Register</button>
  </form>
</div>

<?php include('partials/footer.php'); ?>
