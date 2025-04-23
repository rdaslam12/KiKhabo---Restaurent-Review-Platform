
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reviews - KiKhabo</title>
  <?php require('inc/links.php'); ?>
  <style>
    .review-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
    }
    #reviewForm {
      display: none;
    }
  </style>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container mt-5">
  <h3 class="mb-4">Customer Reviews</h3>

  <button class="btn btn-dark mb-3" onclick="toggleForm()">+ Add Review</button>

  <div id="reviewForm" class="card p-3 mb-4">
    <form method="POST" action="submit_review.php">
      <div class="mb-3">
        <label>Restaurant ID</label>
        <input type="number" name="restaurant_id" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>User ID</label>
        <input type="number" name="user_id" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Rating (1-5)</label>
        <select name="rating" class="form-control" required>
          <option value="">Choose</option>
          <option value="5">★★★★★</option>
          <option value="4">★★★★</option>
          <option value="3">★★★</option>
          <option value="2">★★</option>
          <option value="1">★</option>
        </select>
      </div>
      <div class="mb-3">
        <label>Your Review</label>
        <textarea name="review" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
  </div>

  <?php
  $review_q = "SELECT r.review, r.rating, r.review_date, u.full_name, rest.r_name 
               FROM reviews r 
               INNER JOIN users u ON r.user_id = u.user_id 
               INNER JOIN restaurants rest ON r.restaurant_id = rest.restaurant_id 
               WHERE r.status='approved' 
               ORDER BY r.rating DESC";

  $review_res = mysqli_query($con, $review_q);

  while ($row = mysqli_fetch_assoc($review_res)) {
    echo <<<reviewCard
    <div class="review-card bg-white">
      <h5>{$row['r_name']}</h5>
      <small class="text-muted">Reviewed by: {$row['full_name']}</small><br>
      <strong>Rating:</strong> {$row['rating']} ★<br>
      <p>{$row['review']}</p>
      <small class="text-muted">Reviewed on: {$row['review_date']}</small>
    </div>
    reviewCard;
  }
  ?>
</div>

<?php require('inc/footer.php'); ?>

<script>
  function toggleForm() {
    const form = document.getElementById('reviewForm');
    form.style.display = (form.style.display === 'none') ? 'block' : 'none';
  }
</script>

</body>
</html>
