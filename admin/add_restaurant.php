<?php 
require('inc/essentials.php'); 
adminLogin(); 
require('inc/db_config.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
    $food = filter_input(INPUT_POST, 'food', FILTER_SANITIZE_STRING);
    $decoration = filter_input(INPUT_POST, 'decoration', FILTER_SANITIZE_STRING);
    $tags = filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $sql = "INSERT INTO restaurants (r_name, location, food, decoration, tags, price, rating) VALUES (?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssssssd', $name, $location, $food, $decoration, $tags, $price, $rating);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: restaurants.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Restaurant</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
  <div class="row">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">

      <h3 class="mb-4">Add Restaurant</h3>
      <form method="POST">
        <div class="mb-3">
            <label for="name">Restaurant Name</label>
            <input class="form-control" id="name" type="text" name="name" required>
        </div>
        <div class="mb-3">
            <label for="location">Location</label>
            <input class="form-control" id="location" type="text" name="location" required>
        </div>
        <div class="mb-3">
            <label for="food">Food Type</label>
            <input class="form-control" id="food" type="text" name="food" required>
        </div>
        <div class="mb-3">
            <label for="decoration">Decoration</label>
            <input class="form-control" id="decoration" type="text" name="decoration" required>
        </div>
        <div class="mb-3">
            <label for="tags">Best For / Tags</label>
            <input class="form-control" id="tags" type="text" name="tags" required>
        </div>
        <div class="mb-3">
            <label for="price">Minimum Price</label>
            <input class="form-control" id="price" type="text" name="price" required>
        </div>
        <div class="mb-3">
            <label for="rating">Rating (1.0 - 5.0)</label>
            <input class="form-control" id="rating" type="number" name="rating" step="0.1" min="1" max="5" required>
        </div>
        <button class="btn btn-success" type="submit">Add Restaurant</button>
      </form>

    </div>
  </div>
</div>

<?php require('inc/scripts.php'); ?>
</body>
</html>
