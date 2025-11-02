<?php
include('admin_header.php');
include('../backend/db_connect.php');

$participants = $conn->query("SELECT * FROM event_registrations ORDER BY id DESC");
?>
<h2>Event Participants</h2>
<table>
  <tr>
    <th>ID</th><th>Event ID</th><th>User ID</th><th>Role</th><th>Registered On</th>
  </tr>
  <?php while ($p = $participants->fetch_assoc()) { ?>
  <tr>
    <td><?= $p['id']; ?></td>
    <td><?= $p['event_id']; ?></td>
    <td><?= $p['user_id']; ?></td>
    <td><?= ucfirst($p['role']); ?></td>
    <td><?= $p['created_at']; ?></td>

  </tr>
  <?php } ?>
</table>
<?php include('admin_footer.php'); ?>
