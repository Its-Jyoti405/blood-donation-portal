<?php include('partials/header.php'); ?>

<style>
.hero {
    background: linear-gradient(rgba(230,57,70,0.7), rgba(230,57,70,0.7)), 
                url('backimg.jpg') center/cover no-repeat;
    color: white;
    text-align: center;
    padding: 120px 20px;
}
.hero h1 {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 15px;
}
.hero p {
    font-size: 20px;
    max-width: 700px;
    margin: 0 auto 25px;
}
.hero a {
    background-color: #fff;
    color: #e63946;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.3s ease;
}
.hero a:hover {
    background-color: #e63946;
    color: white;
}

/* ✅ FEATURES SECTION WITH BACKGROUND IMAGE */
.features {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    text-align: center;
    padding: 80px 20px;
    background: url('images/blood_camp_bg.jpg') center/cover no-repeat;
    color: #fff;
    overflow: hidden;
}

/* Overlay for readability */
.features::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5); /* dark overlay */
    z-index: 0;
}

.feature-box {
    flex: 1 1 300px;
    max-width: 320px;
    margin: 20px;
    background: rgba(255, 255, 255, 0.9); /* translucent card */
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    z-index: 1;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-box:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

.feature-box h3 {
    color: #e63946;
    margin-bottom: 10px;
}
.feature-box p {
    color: #333;
    font-size: 15px;
    line-height: 1.6;
}
</style>

<section class="hero">
    <h1>Donate Blood, Save Lives</h1>
    <p>Join hands with our Blood Donation Portal to connect donors and recipients and make a life-saving impact.</p>
    <a href="register.php">Become a Donor</a>
</section>

<section class="features">
    <div class="feature-box">
        <h3>Fast & Reliable</h3>
        <p>Find and request blood within seconds using our real-time database of donors and blood banks.</p>
    </div>
    <div class="feature-box">
        <h3>Community Support</h3>
        <p>Join our network of compassionate individuals and take part in life-saving blood drives and events.</p>
    </div>
    <div class="feature-box">
        <h3>Track Donations</h3>
        <p>Stay updated on your donation history, upcoming events, and contribution impact easily.</p>
    </div>
</section>

<?php include('partials/footer.php'); ?>
