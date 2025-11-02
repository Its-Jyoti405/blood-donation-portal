<?php include('partials/header.php'); ?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fff;
        color: #333;
    }

    .about-section {
        background: linear-gradient(135deg, #fff7f7 0%, #ffeaea 100%);
        padding: 80px 20px;
        text-align: center;
        position: relative;
    }

    .about-section h2 {
        font-size: 40px;
        font-weight: 700;
        color: #e63946;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
    }

    .about-section h2::after {
        content: "";
        display: block;
        width: 80px;
        height: 4px;
        background: #e63946;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .about-section p {
        font-size: 17px;
        color: #444;
        max-width: 850px;
        margin: 15px auto;
        line-height: 1.8;
    }

    /* Card section */
    .about-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 25px;
        margin-top: 60px;
    }

    .about-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        max-width: 320px;
        padding: 25px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .about-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .about-card img {
        width: 100%;
        border-radius: 12px;
        margin-bottom: 15px;
    }

    .about-card h3 {
        color: #e63946;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .about-card p {
        font-size: 15px;
        color: #555;
        line-height: 1.6;
    }

    /* Background decorative shapes */
    .about-section::before,
    .about-section::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(230, 57, 70, 0.08);
        z-index: 0;
    }

    .about-section::before {
        width: 250px;
        height: 250px;
        top: -80px;
        right: -80px;
    }

    .about-section::after {
        width: 200px;
        height: 200px;
        bottom: -80px;
        left: -80px;
    }

    /* Image below text */
    .about-img {
        margin-top: 60px;
    }

    .about-img img {
        width: 60%;
        max-width: 500px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 768px) {
        .about-cards {
            flex-direction: column;
            align-items: center;
        }

        .about-img img {
            width: 85%;
        }
    }
</style>

<section class="about-section">
    <h2>About Us</h2>
    <p>
        Welcome to <strong>Blood Donation Portal</strong> — a platform dedicated to connecting donors,
        recipients, and volunteers. We aim to make the process of finding and donating blood faster,
        easier, and more transparent.
    </p>
    <p>
        Our system helps hospitals and patients find the right donors instantly, promotes community
        blood donation drives, and spreads awareness about the importance of saving lives through
        blood donation.
    </p>
    <p>
        Together, we can make a real difference — one drop at a time. Join us in creating a network of
        kindness, compassion, and humanity.
    </p>

    <div class="about-cards">
        <div class="about-card">
            <!-- <img src="images/vision.jpg" alt="Our Vision"> -->
            <h3>Our Vision</h3>
            <p>To create a world where no life is lost due to blood shortage, and everyone has access to hope through donation.</p>
        </div>

        <div class="about-card">
            <!-- <img src="images/mission.jpg" alt="Our Mission"> -->
            <h3>Our Mission</h3>
            <p>Connecting donors, recipients, and hospitals seamlessly — making every drop count in saving lives.</p>
        </div>

        <div class="about-card">
            <!-- <img src="images/community.jpg" alt="Community"> -->
            <h3>Join the Movement</h3>
            <p>Become a donor, volunteer, or organizer. Together we can inspire a culture of saving lives through unity.</p>
        </div>
    </div>

    <div class="about-img">
        <img src="abim.jpg" alt="Blood Donation Camp">
    </div>
</section>

<?php include('partials/footer.php'); ?>
