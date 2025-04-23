<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $restaurant_id = $_POST['restaurant_id'];
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];
    $review = mysqli_real_escape_string($con, $_POST['review']);
    $review_date = date('Y-m-d H:i:s');

    $query = "INSERT INTO reviews (restaurant_id, user_id, rating, review, review_date, status) VALUES
              ('$restaurant_id', '$user_id', '$rating', '$review', '$review_date', 'pending')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Review submitted successfully! Pending approval.'); window.location.href='review.php';</script>";
    } else {
        echo "<script>alert('Failed to submit review.'); window.location.href='review.php';</script>";
    }
} else {
    header("Location: review.php");
    exit();
}
