<?php
require('inc/essentials.php');
adminLogin();
require('inc/db_config.php');

$restaurant = null;


if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM restaurants WHERE restaurant_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $restaurant = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$restaurant) {
        alert('error', 'Restaurant not found.');
        redirect('restaurants.php');
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
    $food = filter_input(INPUT_POST, 'food', FILTER_SANITIZE_STRING);
    $decoration = filter_input(INPUT_POST, 'decoration', FILTER_SANITIZE_STRING);
    $tags = filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $sql = "UPDATE restaurants SET r_name = ?, location = ?, food = ?, decoration = ?, tags = ?, price = ?, rating = ? WHERE restaurant_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssssdi', $name, $location, $food, $decoration, $tags, $price, $rating, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    alert('success', 'Restaurant updated successfully.');
    redirect('restaurants.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Restaurant</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
  <div class="row">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">

      <h3 class="mb-4">Edit Restaurant</h3>
      <form method="POST">
        <input type="hidden" name="id" value="<?= $restaurant['restaurant_id'] ?>">
        <div class="mb-3">
            <label for="name">Restaurant Name</label>
            <input class="form-control" id="name" type="text" name="name" value="<?= htmlspecialchars($restaurant['r_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="location">Location</label>
            <input class="form-control" id="location" type="text" name="location" value="<?= htmlspecialchars($restaurant['location']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="food">Food Type</label>
            <input class="form-control" id="food" type="text" name="food" value="<?= htmlspecialchars($restaurant['food']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="decoration">Decoration</label>
            <input class="form-control" id="decoration" type="text" name="decoration" value="<?= htmlspecialchars($restaurant['decoration']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="tags">Best For / Tags</label>
            <input class="form-control" id="tags" type="text" name="tags" value="<?= htmlspecialchars($restaurant['tags']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="price">Price Range</label>
            <input class="form-control" id="price" type="text" name="price" value="<?= htmlspecialchars($restaurant['price']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="rating">Rating (1.0 - 5.0)</label>
            <input class="form-control" id="rating" type="number" step="0.1" min="1" max="5" name="rating" value="<?= htmlspecialchars($restaurant['rating']) ?>" required>
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
        <a href="restaurants.php" class="btn btn-secondary">Cancel</a>
      </form>

    </div>
  </div>
</div>

<?php require('inc/scripts.php'); ?>
</body>
</html>
