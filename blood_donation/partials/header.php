<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood Donation Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    /* ======== HEADER STYLING ======== */
    .navbar {
      background: linear-gradient(to right, #ffffff, #fff5f5);
      border-bottom: 3px solid #e63946;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      padding: 0.8rem 0;
      transition: all 0.3s ease-in-out;
    }

    .navbar-brand {
      font-weight: 700;
      color: #e63946 !important;
      font-size: 1.6rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .navbar-brand i {
      color: #e63946;
      font-size: 1.8rem;
      text-shadow: 0 0 6px rgba(230,57,70,0.4);
    }

    .nav-link {
      color: #333 !important;
      font-weight: 500;
      margin: 0 8px;
      position: relative;
      transition: all 0.3s ease;
    }
    .nav-link:hover {
      color: #e63946 !important;
    }
    .nav-link::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 0%;
      height: 2px;
      background-color: #e63946;
      transition: width 0.3s ease;
    }
    .nav-link:hover::after {
      width: 100%;
    }

    .navbar-toggler {
      border: none;
    }

    .navbar .dropdown-menu {
      border-radius: 10px;
      border: none;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* Add spacing to content below navbar */
    .nav-space {
      margin-top: 90px;
    }
  </style>
</head>
<body>

<!-- ======== NAVBAR ======== -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <i class="bi bi-droplet-fill"></i> BloodPortal
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="available_blood.php">Available Blood</a></li>
        <li class="nav-item"><a class="nav-link" href="events.php">Events</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
      </ul>

      <ul class="navbar-nav">
        <?php if (!isset($_SESSION['user_id'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown">
              <i class="bi bi-person-circle fs-4"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="login.php?type=user">User Login</a></li>
              <li><a class="dropdown-item" href="login.php?type=admin">Admin Login</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-person-check fs-4 text-danger"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="user_dashboard.php">My Dashboard</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="nav-space"></div>
