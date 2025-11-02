<?php session_start(); ?>
<nav class="navbar">
  <div class="nav-container">
    <a href="index.php" class="logo">🩸 BloodLink</a>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="events.php">Events</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>

    <div class="nav-auth">
      <?php if(isset($_SESSION['user'])) { ?>
          <div class="user-dropdown">
              <button class="dropbtn">👤 <?= $_SESSION['user']; ?></button>
              <div class="dropdown-content">
                  <a href="available_blood.php">Available Blood</a>
                  <a href="donate.php">Donate Blood</a>
                  <a href="logout.php">Logout</a>
              </div>
          </div>
      <?php } else { ?>
          <div class="user-dropdown">
              <button class="dropbtn">🔑 Login</button>
              <div class="dropdown-content">
                  <a href="login.php">User Login</a>
                  <a href="../admin/admin_login.php">Admin Login</a>
              </div>
          </div>
      <?php } ?>
    </div>
  </div>
</nav>
