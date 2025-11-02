<?php
include('partials/header.php');
include('backend/db_connect.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?type=user");
    exit;
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM blood_requests WHERE user_id='$user_id' ORDER BY requested_at DESC");
?>

<div class="container mt-5">
  <h3 class="text-danger fw-bold mb-4 text-center">📋 My Blood Requests</h3>

  <?php if ($result->num_rows == 0): ?>
    <div class="alert alert-info text-center">You haven’t made any blood requests yet.</div>
  <?php else: ?>
    <table class="table table-bordered text-center align-middle">
      <thead class="table-danger">
        <tr>
          <th>ID</th>
          <th>Blood Group</th>
          <th>Units</th>
          <th>Status</th>
          <th>Requested On</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['blood_group']) ?></td>
            <td><?= $row['units_requested'] ?></td>
            <td>
              <?php if ($row['status'] == 'Approved'): ?>
                <span class="badge bg-success">Approved</span>
              <?php elseif ($row['status'] == 'Rejected'): ?>
                <span class="badge bg-danger">Rejected</span>
              <?php else: ?>
                <span class="badge bg-warning text-dark">Pending</span>
              <?php endif; ?>
            </td>
            <td><?= $row['requested_at'] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<?php include('partials/footer.php'); ?>
