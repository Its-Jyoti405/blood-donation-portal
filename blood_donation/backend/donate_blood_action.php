<?php
session_start();
include('db_connect.php');

$user = $_SESSION['user'];
$name = $_POST['name'];
$blood = $_POST['blood_group'];
$contact = $_POST['contact'];
$date = $_POST['donation_date'];
$msg = $_POST['message'];

mysqli_query($conn, "INSERT INTO donations (user_email, name, blood_group, contact, donation_date, message, status)
VALUES ('$user','$name','$blood','$contact','$date','$msg','Pending')");

header("Location: ../user/donate_blood.php?success=1");
exit;
?>
