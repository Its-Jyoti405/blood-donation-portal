<?php include('partials/header.php'); ?>
<style>
    /* SERVICES PAGE MODERN DESIGN */
.services-section {
  min-height: 100vh;
  background: linear-gradient(180deg, #fff 0%, #ffe6e6 100%);
  padding: 70px 8%;
  text-align: center;
}

.services-header h2 {
  font-size: 38px;
  color: #c70039;
  font-weight: 800;
  margin-bottom: 10px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.services-header p {
  color: #444;
  font-size: 18px;
  margin-bottom: 50px;
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
}

.service-card {
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 5px 20px rgba(0,0,0,0.08);
  padding: 40px 25px;
  transition: all 0.3s ease;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

.service-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 0%;
  height: 100%;
  background: linear-gradient(135deg, #ff4b5c, #c70039);
  transition: all 0.4s ease;
  z-index: 0;
}

.service-card:hover::before {
  width: 100%;
}

.service-card .icon {
  font-size: 45px;
  color: #c70039;
  margin-bottom: 15px;
  z-index: 1;
  position: relative;
}

.service-card h3 {
  font-size: 22px;
  color: #222;
  margin-bottom: 12px;
  z-index: 1;
  position: relative;
}

.service-card p {
  font-size: 15px;
  color: #555;
  line-height: 1.6;
  z-index: 1;
  position: relative;
}

.service-card:hover h3,
.service-card:hover p,
.service-card:hover .icon {
  color: #fff;
  transition: all 0.3s ease;
}

@media (max-width: 768px) {
  .services-header h2 {
    font-size: 28px;
  }
  .service-card {
    padding: 30px 20px;
  }
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<section class="services-section">
  <div class="services-header">
    <h2>Our Services</h2>
    <p>Empowering lives through blood donation, awareness, and healthcare partnerships.</p>
  </div>

  <div class="services-grid">
    <div class="service-card">
      <div class="icon"><i class="fas fa-hand-holding-medical"></i></div>
      <h3>Blood Donation Camps</h3>
      <p>We organize donation drives in collaboration with hospitals and NGOs to make blood donation easier for everyone.</p>
    </div>

    <div class="service-card">
      <div class="icon"><i class="fas fa-user-plus"></i></div>
      <h3>Donor Registration</h3>
      <p>Register as a donor and get instant alerts whenever your blood type is in demand nearby.</p>
    </div>

    <div class="service-card">
      <div class="icon"><i class="fas fa-database"></i></div>
      <h3>Blood Bank Management</h3>
      <p>Real-time blood stock management helps hospitals and donors track available blood units efficiently.</p>
    </div>

    <div class="service-card">
      <div class="icon"><i class="fas fa-headset"></i></div>
      <h3>24/7 Emergency Support</h3>
      <p>We ensure fast response to emergency blood requirements through verified donor networks.</p>
    </div>

    <div class="service-card">
      <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
      <h3>Awareness & Training</h3>
      <p>We conduct seminars and awareness sessions on safe blood donation and the health benefits of regular donation.</p>
    </div>

    <div class="service-card">
      <div class="icon"><i class="fas fa-hospital"></i></div>
      <h3>Hospital Collaboration</h3>
      <p>Partnering with hospitals and health centers to ensure seamless and reliable blood supply when needed.</p>
    </div>
  </div>
</section>

<?php include('partials/footer.php'); ?>
