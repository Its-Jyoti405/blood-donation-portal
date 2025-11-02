<?php
session_start();
if(!isset($_SESSION['user'])) { header("Location: ../auth/user_login.php"); exit; }
include('../backend/db_connect.php');
$events = mysqli_query($conn, "SELECT * FROM events ORDER BY event_date ASC");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Events</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php include('../includes/navbar.php'); ?>
<div class="container">
  <h2>Upcoming Events</h2>
  <div class="event-grid">
    <?php while($row = mysqli_fetch_assoc($events)) { ?>
      <div class="event-card">
        <h3><?= $row['event_name'] ?></h3>
        <p><strong>Date:</strong> <?= $row['event_date'] ?></p>
        <p><?= $row['description'] ?></p>
        <form action="../backend/event_register_action.php" method="POST">
          <input type="hidden" name="event_id" value="<?= $row['id'] ?>">
          <select name="role" required>
            <option value="">Select Role</option>
            <option>Volunteer</option>
            <option>Donor</option>
          </select>
          <button type="submit">Register</button>
        </form>
      </div>
    <?php } ?>
  </div>
</div>
</body>
</html>
