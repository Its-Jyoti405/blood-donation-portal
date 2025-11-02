<?php
include('partials/header.php');
include('backend/db_connect.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?type=user");
    exit;
}

$msg = '';
if (isset($_POST['donate'])) {
    $user_id = $_SESSION['user_id'];
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $blood = mysqli_real_escape_string($conn, $_POST['blood_group']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $date = mysqli_real_escape_string($conn, $_POST['donation_date']);

    $conn->query("INSERT INTO donors (user_id, fullname, blood_group, contact, address, donation_date)
                  VALUES ('$user_id', '$fullname', '$blood', '$contact', '$address', '$date')");
    $msg = "<div class='alert alert-success mt-3'>Thank you for registering to donate blood! Pending admin approval.</div>";
}
?>

<div class="container mt-5" style="max-width:600px;">
  <h3 class="text-danger fw-bold text-center mb-4">🩸 Register as Blood Donor</h3>
  <?php echo $msg; ?>
  <form method="POST">
    <div class="mb-3">
      <label>Full Name</label>
      <input type="text" name="fullname" class="form-control" value="<?= $_SESSION['user_name']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Blood Group</label>
      <select name="blood_group" class="form-select" required>
        <option value="">Select</option>
        <option>A+</option><option>A-</option><option>B+</option><option>B-</option>
        <option>O+</option><option>O-</option><option>AB+</option><option>AB-</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Contact Number</label>
      <input type="text" name="contact" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Address</label>
      <textarea name="address" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label>Preferred Donation Date</label>
      <input type="date" name="donation_date" class="form-control" required>
    </div>
    <button type="submit" name="donate" class="btn btn-danger w-100">Submit</button>
  </form>
</div>

<?php include('partials/footer.php'); ?>
