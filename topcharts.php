<!DOCTYPE html>
<html lang="en">
<head>
  <title>Top 10 Charts - KiKhabo</title>
  <?php require('inc/links.php'); ?>
  <style>
    .top-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
    }
    .top-card img {
      max-width: 100%;
      border-radius: 10px;
    }
  </style>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container mt-5">
  <h3 class="mb-4">Top 10 Charts</h3>

  <?php
  $top_query = "
    SELECT res.restaurant_id, res.r_name, res.location, res.image,
           ROUND(AVG(rv.rating), 2) AS avg_rating,
           COUNT(rv.id) AS voters_count
    FROM restaurants res
    JOIN reviews rv ON res.restaurant_id = rv.restaurant_id
    WHERE rv.status = 'approved'
    GROUP BY res.restaurant_id
    ORDER BY avg_rating DESC, voters_count DESC
  ";

  $top_res = mysqli_query($con, $top_query);

  while ($row = mysqli_fetch_assoc($top_res)) {
    echo <<<topCard
    <div class="top-card bg-white row">
      <div class="col-md-4">
        <img src="{$row['image']}" alt="{$row['r_name']}">
      </div>
      <div class="col-md-8">
        <h5 class="mt-3 mt-md-0">{$row['r_name']}</h5>
        <p><strong>Location:</strong> {$row['location']}</p>
        <p><strong>Average Rating:</strong> {$row['avg_rating']} ★</p>
        <p><strong>Voted by:</strong> {$row['voters_count']} people</p>
      </div>
    </div>
    topCard;
  }
  ?>
</div>

<?php require('inc/footer.php'); ?>

</body>
</html>
