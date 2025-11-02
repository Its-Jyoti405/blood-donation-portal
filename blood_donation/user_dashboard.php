<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard | Blood Donation Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fafafa;
      font-family: "Poppins", sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Navbar */
    .navbar {
      background-color: #dc3545;
    }
    .navbar-brand {
      font-weight: 700;
      color: #fff !important;
      font-size: 1.5rem;
    }
    .nav-link {
      color: #fff !important;
      font-weight: 500;
    }

    /* Dashboard Content */
    .dashboard {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 40px 20px;
    }

    .dashboard h2 {
      color: #e63946;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .dashboard p {
      color: #555;
      font-size: 1.1rem;
      margin-bottom: 30px;
    }

    .dashboard .btn {
      border-radius: 10px;
      padding: 12px 25px;
      margin: 10px;
      font-weight: 500;
      transition: all 0.3s ease-in-out;
    }

    .btn-outline-danger:hover {
      background-color: #e63946;
      color: #fff;
      transform: translateY(-2px);
    }

    .btn-danger {
      background-color: #e63946;
      border: none;
    }

    /* Footer */
    footer {
      background-color: #212529;
      color: #fff;
      text-align: center;
      padding: 12px 0;
      font-size: 0.95rem;
      margin-top: auto;
    }

    footer span {
      color: #f87171;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><span>🩸</span> BloodPortal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="user_dashboard.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="events.php">Events</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Dashboard Content -->
  <section class="dashboard">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?> 👋</h2>
    <p>Manage your blood requests, donations, and events here.</p>

    <div>
      <a href="available_blood.php" class="btn btn-outline-danger">🩸 View Available Blood</a>
      <a href="request_blood.php" class="btn btn-danger">📩 Request Blood</a>
      <a href="my_requests.php" class="btn btn-outline-danger">📄 My Requests</a>
      <a href="events.php" class="btn btn-outline-danger">🎉 Join Events</a>
    </div>

    <a href="logout.php" class="btn btn-dark mt-4">🚪 Logout</a>
  </section>

  <!-- Footer -->
  <footer>
    © 2025 <span>Blood Donation Portal</span> | All Rights Reserved
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
