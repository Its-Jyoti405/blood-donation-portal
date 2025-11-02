<?php
include('admin_header.php');
include('../backend/db_connect.php');

// Fetch all users (donors)
$donors = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>
<h2>Registered Donors</h2>
<table>
  <tr>
    <th>ID</th><th>Full Name</th><th>Email</th><th>Blood Group</th><th>Registered On</th>
  </tr>
  <?php while ($d = $donors->fetch_assoc()) { ?>
  <tr>
    <td><?= $d['id']; ?></td>
    <td><?= $d['fullname']; ?></td>  <!-- ✅ FIXED -->
    <td><?= $d['email']; ?></td>
    <td><?= $d['blood_group']; ?></td>
    <td><?= $d['created_at']; ?></td>
  </tr>
  <?php } ?>
</table>
<?php include('admin_footer.php'); ?>
