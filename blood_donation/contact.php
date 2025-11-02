<?php include('partials/header.php'); ?>
<div class="container mt-5">
  <h2 class="text-danger fw-bold text-center">Contact Us</h2>
  <form class="mt-4 mx-auto" style="max-width:600px;">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" placeholder="Enter your name">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" placeholder="Enter your email">
    </div>
    <div class="mb-3">
      <label class="form-label">Message</label>
      <textarea class="form-control" rows="3" placeholder="Your message"></textarea>
    </div>
    <button type="submit" class="btn btn-danger w-100">Send Message</button>
  </form>
</div>
<?php include('partials/footer.php'); ?>
