<?php
include('admin_header.php');
include('../backend/db_connect.php');

// Handle approval/rejection
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    $conn->query("UPDATE blood_requests SET status='Approved' WHERE id=$id");
}
if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
    $conn->query("UPDATE blood_requests SET status='Rejected' WHERE id=$id");
}

// Fetch all requests
$requests = $conn->query("SELECT * FROM blood_requests ORDER BY id DESC");
?>

<div class="container mt-4">
  <h2 class="text-danger fw-bold mb-4">🩸 Manage Blood Requests</h2>
  <table class="table table-bordered table-hover align-middle shadow-sm">
    <thead class="table-danger text-center">
      <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Blood Group</th>
        <th>Units</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($r = $requests->fetch_assoc()) { ?>
      <tr>
        <td><?= $r['id']; ?></td>
        <td><?= $r['user_id']; ?></td>
        <td><?= $r['blood_group']; ?></td>
        <td><?= $r['units_requested']; ?></td>
        <td>
          <?php if ($r['status'] == 'Approved'): ?>
            <span class="badge bg-success">Approved</span>
          <?php elseif ($r['status'] == 'Rejected'): ?>
            <span class="badge bg-danger">Rejected</span>
          <?php else: ?>
            <span class="badge bg-secondary">Pending</span>
          <?php endif; ?>
        </td>
        <td class="text-center">
          <a href="?approve=<?= $r['id']; ?>" class="btn btn-sm btn-success me-2">Approve</a>
          <a href="?reject=<?= $r['id']; ?>" class="btn btn-sm btn-danger">Reject</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php include('admin_footer.php'); ?>
