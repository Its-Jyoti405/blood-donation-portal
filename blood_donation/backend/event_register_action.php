<?php
session_start();
include('db_connect.php');
$user = $_SESSION['user'];
$event_id = $_POST['event_id'];
$role = $_POST['role'];

mysqli_query($conn, "INSERT INTO event_registrations (user_email, event_id, role, status)
VALUES ('$user','$event_id','$role','Pending')");

header("Location: ../user/events.php?registered=1");
exit;
?>
