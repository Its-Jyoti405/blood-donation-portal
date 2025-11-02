<?php
include('partials/header.php');
include('backend/db_connect.php');

$result = $conn->query("SELECT * FROM blood_stock");
?>

<div class="container mt-5">
  <h3 class="text-danger fw-bold text-center mb-4">🩸 Available Blood Stock</h3>

  <table class="table table-bordered text-center align-middle">
    <thead class="table-dark">
      <tr>
        <th>Blood Group</th>
        <th>Units Available</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['blood_group'] ?></td>
          <td><?= $row['units'] ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include('partials/footer.php'); ?>
