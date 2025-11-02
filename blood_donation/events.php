<?php
include('partials/header.php');
include('backend/db_connect.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?type=user");
    exit;
}

$events = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
?>

<div class="container mt-5">
  <h3 class="text-danger fw-bold text-center mb-4">🎉 Upcoming Events</h3>

  <?php if ($events->num_rows == 0): ?>
    <div class="alert alert-info text-center">No upcoming events found.</div>
  <?php else: ?>
    <div class="row">
      <?php while ($row = $events->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm border-danger">
            <div class="card-body">
              <h5 class="card-title text-danger fw-bold"><?= htmlspecialchars($row['event_name']); ?></h5>
              <p><strong>Date:</strong> <?= $row['event_date']; ?></p>
              <p><strong>Location:</strong> <?= htmlspecialchars($row['location']); ?></p>
              <p><?= htmlspecialchars($row['description']); ?></p>
              <a href="event_register.php?id=<?= $row['id']; ?>" class="btn btn-danger w-100">Register</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</div>

<?php include('partials/footer.php'); ?>
