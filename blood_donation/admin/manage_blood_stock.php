<?php
include('admin_header.php');
include('../backend/db_connect.php');

// Add new stock
if (isset($_POST['add'])) {
    $group = $_POST['blood_group'];
    $units = $_POST['units'];
    $hospital = $_POST['hospital_name'];
    $location = $_POST['location'];

    $conn->query("INSERT INTO blood_stock (blood_group, units, hospital_name, location)
                  VALUES ('$group', '$units', '$hospital', '$location')");
}

// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM blood_stock WHERE id=$id");
}

$stock = $conn->query("SELECT * FROM blood_stock ORDER BY blood_group ASC");
?>

<style>
.stock-container { max-width: 900px; margin: 40px auto; background: #fff; padding: 25px;
  border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
.stock-container h2 { color:#d63031; text-align:center; margin-bottom:25px; }
.stock-container form { display:flex; flex-wrap:wrap; gap:10px; justify-content:center; }
.stock-container input, select { padding:10px; border:1px solid #ccc; border-radius:6px; }
.stock-container button { background:#d63031; color:white; border:none; padding:10px 20px;
  border-radius:6px; cursor:pointer; }
.stock-container table { width:100%; border-collapse:collapse; margin-top:25px; }
.stock-container th, td { border:1px solid #ddd; padding:10px; text-align:center; }
.stock-container th { background:#d63031; color:white; }
.stock-container a { color:#d63031; text-decoration:none; }
</style>

<div class="stock-container">
  <h2>🩸 Manage Blood Stock</h2>
  <form method="POST">
    <select name="blood_group" required>
      <option value="">Select Blood Group</option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
    </select>
    <input type="number" name="units" placeholder="Units (ml)" required>
    <input type="text" name="hospital_name" placeholder="Hospital Name" required>
    <input type="text" name="location" placeholder="Location" required>
    <button type="submit" name="add">Add Blood</button>
  </form>

  <table>
    <tr><th>ID</th><th>Blood Group</th><th>Units</th><th>Hospital</th><th>Location</th><th>Action</th></tr>
    <?php while($b = $stock->fetch_assoc()) { ?>
      <tr>
        <td><?= $b['id']; ?></td>
        <td><?= $b['blood_group']; ?></td>
        <td><?= $b['units']; ?></td>
        <td><?= $b['hospital_name']; ?></td>
        <td><?= $b['location']; ?></td>
        <td><a href="?delete=<?= $b['id']; ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</div>

<?php include('admin_footer.php'); ?>
