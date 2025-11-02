<?php
session_start();
include('../backend/db_connect.php');
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

// Approve / Reject logic
if (isset($_GET['action'], $_GET['id'])) {
    $id = (int)$_GET['id'];
    $action = $_GET['action'];

    $req = $conn->query("SELECT * FROM blood_requests WHERE id=$id")->fetch_assoc();

    if ($req && $req['status'] == 'Pending') {
        $blood_group = $req['blood_group'];
        $units = $req['units_requested'];

        if ($action == 'approve') {
            $stock = $conn->query("SELECT * FROM blood_stock WHERE blood_group='$blood_group'")->fetch_assoc();

            if ($stock && $stock['units'] >= $units) {
                // Deduct units
                $conn->query("UPDATE blood_stock SET units = units - $units WHERE blood_group='$blood_group'");
                $conn->query("UPDATE blood_requests SET status='Approved' WHERE id=$id");
                $msg = "✅ Request approved and stock updated.";
            } else {
                $msg = "❌ Not enough stock available.";
            }
        } elseif ($action == 'reject') {
            $conn->query("UPDATE blood_requests SET status='Rejected' WHERE id=$id");
            $msg = "⚠️ Request rejected.";
        }
    }
}

$result = $conn->query("SELECT r.*, u.name FROM blood_requests r JOIN users u ON r.user_id=u.id ORDER BY r.requested_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Blood Requests</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2 class="text-danger">🩸 Manage Blood Requests</h2>
  <?php if (!empty($msg)) echo "<div class='alert alert-info'>$msg</div>"; ?>

  <table class="table table-bordered mt-3">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>User</th>
        <th>Blood Group</th>
        <th>Units</th>
        <th>Status</th>
        <th>Requested On</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= $row['blood_group'] ?></td>
          <td><?= $row['units_requested'] ?></td>
          <td><?= $row['status'] ?></td>
          <td><?= $row['requested_at'] ?></td>
          <td>
            <?php if ($row['status'] == 'Pending') { ?>
              <a href="?action=approve&id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Approve</a>
              <a href="?action=reject&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Reject</a>
            <?php } else { ?>
              <span class="text-secondary">—</span>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
