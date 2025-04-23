<?php
require('inc/essentials.php');
adminLogin();
require('inc/db_config.php');

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    
    $deleteReviewsSql = "DELETE FROM reviews WHERE user_id = ?";
    $deleteReviewsStmt = mysqli_prepare($con, $deleteReviewsSql);
    mysqli_stmt_bind_param($deleteReviewsStmt, 'i', $id);
    mysqli_stmt_execute($deleteReviewsStmt);
    mysqli_stmt_close($deleteReviewsStmt);
    
    
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    alert('success', 'User  deleted successfully.');
}

redirect('ui.php');
?>