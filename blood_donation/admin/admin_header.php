<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="admin_style.css">
</head>
<body>
  <header class="admin-header">
    <h2>🩸 Blood Donation Admin</h2>
    <nav>
      <a href="dashboard.php">Dashboard</a>
      <a href="manage_blood.php">Manage Blood</a>
      <a href="manage_donors.php">Donors</a>
      <a href="manage_events.php">Events</a>
      <a href="manage_participants.php">Participants</a>
      <a href="logout.php" class="logout-btn">Logout</a>
    </nav>
  </header>
  <main class="admin-main">
