<?php
include('admin_header.php');
?>

<style>
.dashboard-container {
  max-width: 1000px;
  margin: 60px auto;
  padding: 30px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  text-align: center;
}

.dashboard-container h2 {
  color: #d63031;
  font-weight: 700;
  margin-bottom: 25px;
}

.dashboard-links {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 25px;
  margin-top: 20px;
}

.dashboard-card {
  background: #f8f9fa;
  border: 2px solid #d63031;
  border-radius: 10px;
  width: 200px;
  padding: 25px 10px;
  text-align: center;
  transition: 0.3s ease;
}

.dashboard-card:hover {
  background: #d63031;
  color: white;
  transform: translateY(-5px);
}

.dashboard-card a {
  color: #d63031;
  text-decoration: none;
  font-weight: 600;
  font-size: 17px;
}

.dashboard-card:hover a {
  color: white;
}
</style>

<div class="dashboard-container">
  <h2>👋 Welcome, Admin</h2>
  <p>Manage all sections of the Blood Donation Portal from here.</p>

  <div class="dashboard-links">
    <div class="dashboard-card">
      <a href="manage_blood.php">🩸 Manage Blood</a>
    </div>
    <div class="dashboard-card">
      <a href="manage_donors.php">❤️ Donors</a>
    </div>
    <div class="dashboard-card">
      <a href="manage_events.php">🎉 Events</a>
    </div>
    <div class="dashboard-card">
      <a href="manage_participants.php">👥 Participants</a>
    </div>
    <div class="dashboard-card">
        <a href="manage_blood_stock.php">🩸 Manage Blood Stock</a>
    </div>
  </div>
</div>

<?php include('admin_footer.php'); ?>
