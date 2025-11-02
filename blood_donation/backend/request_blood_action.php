<?php
session_start();
include('db_connect.php');
$user = $_SESSION['user'];
$blood_group = $_POST['blood_group'];

mysqli_query($conn, "INSERT INTO blood_requests (user_email, blood_group, status)
VALUES ('$user','$blood_group','Pending')");

header("Location: ../user/available_blood.php?requested=1");
exit;
?>
