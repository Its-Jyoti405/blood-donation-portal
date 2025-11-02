<?php
include('admin_header.php');
include('../backend/db_connect.php');

// Add event
if (isset($_POST['add'])) {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];
    $desc = $_POST['description'];

    $conn->query("INSERT INTO events (event_name, event_date, location, description) 
                  VALUES ('$event_name','$event_date','$location','$desc')");
}

// Delete event
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM events WHERE id=$id");
}

$events = $conn->query("SELECT * FROM events ORDER BY event_date DESC");
?>
<h2>Manage Events</h2>

<form method="POST" class="event-form">
  <input type="text" name="event_name" placeholder="Event Name" required>
  <input type="date" name="event_date" required>
  <input type="text" name="location" placeholder="Location" required>
  <textarea name="description" placeholder="Description" required></textarea>
  <button type="submit" name="add">Add Event</button>
</form>

<table>
  <tr><th>ID</th><th>Event Name</th><th>Date</th><th>Location</th><th>Description</th><th>Action</th></tr>
  <?php while($e = $events->fetch_assoc()) { ?>
  <tr>
    <td><?= $e['id']; ?></td>
    <td><?= $e['event_name']; ?></td>
    <td><?= $e['event_date']; ?></td>
    <td><?= $e['location']; ?></td>
    <td><?= $e['description']; ?></td>
    <td><a href="?delete=<?= $e['id']; ?>" class="delete-btn">Delete</a></td>
  </tr>
  <?php } ?>
</table>

<?php include('admin_footer.php'); ?>
