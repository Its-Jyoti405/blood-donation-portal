<?php
include('partials/header.php');
include('backend/db_connect.php');

$result = $conn->query("SELECT * FROM blood_stock ORDER BY blood_group ASC");
?>

<div class="container mt-5">
  <h2 class="text-center text-danger mb-4">🩸 Available Blood Stock</h2>
  <table class="table table-bordered text-center">
    <thead class="table-danger">
      <tr>
        <th>Blood Group</th>
        <th>Units (ml)</th>
        <th>Hospital</th>
        <th>Location</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?= $row['blood_group']; ?></td>
            <td><?= $row['units']; ?></td>
            <td><?= $row['hospital_name']; ?></td>
            <td><?= $row['location']; ?></td>
            <td><?= $row['updated_at']; ?></td>
          </tr>
      <?php }} else {
        echo "<tr><td colspan='5'>No blood stock available currently.</td></tr>";
      } ?>
    </tbody>
  </table>
</div>

<?php include('partials/footer.php'); ?>
