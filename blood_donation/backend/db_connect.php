<?php
// backend/db_connect.php
$host = 'localhost';
$user = 'root';
$pass = ''; // set your MySQL password if any
$db   = 'blood_donation_portal';
$port = 3307;

$conn = mysqli_connect($host, $user, $pass, $db, $port);
if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}
mysqli_set_charset($conn, 'utf8mb4');
?>
