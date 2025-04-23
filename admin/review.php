<?php
require('inc/essentials.php');
adminLogin();
require('inc/db_config.php');


if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    $update = mysqli_query($con, "UPDATE reviews SET status='approved' WHERE id=$id");
    if ($update) {
        alert('success', 'Review approved!');
    } else {
        alert('error', 'Failed to approve review!');
    }
    redirect('review.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($con, "DELETE FROM reviews WHERE id=$id");
    if ($delete) {
        alert('success', 'Review deleted!');
    } else {
        alert('error', 'Failed to delete review!');
    }
    redirect('review.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel - Reviews</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
  <div class="row">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">

      <h2 class="mb-4">Reviews</h2>

      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="table-dark text-center">
            <tr>
              <th>#</th>
              <th>Restaurant</th>
              <th>User</th>
              <th>Rating</th>
              <th>Review</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
            $q = "SELECT r.id, ru.r_name, u.full_name, r.rating, r.review, r.review_date, r.status 
                  FROM reviews r 
                  JOIN restaurants ru ON r.restaurant_id = ru.restaurant_id 
                  JOIN users u ON r.user_id = u.user_id 
                  ORDER BY r.review_date DESC";
            $res = mysqli_query($con, $q);
            $count = 1;

            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {

                    $approveBtn = '';
                    if ($row['status'] == 'pending') {
                        $approveBtn = "<a href='?approve={$row['id']}' class='btn btn-success btn-sm'>Approve</a>";
                    }

                    echo <<<data
                      <tr>
                        <td>$count</td>
                        <td>{$row['r_name']}</td>
                        <td>{$row['full_name']}</td>
                        <td>{$row['rating']}</td>
                        <td>{$row['review']}</td>
                        <td>{$row['review_date']}</td>
                        <td>{$row['status']}</td>
                        <td>
                          $approveBtn
                          <a href="?delete={$row['id']}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this review?');">Delete</a>
                        </td>
                      </tr>
                    data;
                    $count++;
                }
            } else {
                echo "<tr><td colspan='8'>No reviews found.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<?php require('inc/scripts.php'); ?>
</body>
</html>
