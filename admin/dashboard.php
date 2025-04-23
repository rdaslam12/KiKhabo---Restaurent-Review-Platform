<?php
require('inc/essentials.php');
require('inc/db_config.php');
require('inc/header.php');
adminLogin();
// Fetch counts
$restaurant_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM restaurants"))['total'];
$user_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM users"))['total'];
$review_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM reviews"))['total'];

// Fetch recent activity
$activity_q = mysqli_query($con, "SELECT * FROM activity_log ORDER BY id DESC LIMIT 3");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Dashboard</title>
  <?php require('inc/links.php') ?>
</head>

<body class="bg-light">





<div class="container-fluid">
  <div class="row">
    <div class="col-lg-2 d-none d-lg-block"></div>

    <div class="col-lg-10 ms-auto p-4" id="main-content">
      <h4 class="mb-4 h-font">Dashboard Overview</h4>

      <div class="row mb-4">
        <div class="col-md-4 mb-3">
          <div class="card border-0 shadow-sm stat-card">
            <div class="card-body text-center">
              <h5 class="card-title">Total Restaurants</h5>
              <h2 class="mb-0"><?= $restaurant_count ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card border-0 shadow-sm stat-card">
            <div class="card-body text-center">
              <h5 class="card-title">Total Users</h5>
              <h2 class="mb-0"><?= $user_count ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card border-0 shadow-sm stat-card">
            <div class="card-body text-center">
              <h5 class="card-title">Total Reviews</h5>
              <h2 class="mb-0"><?= $review_count ?></h2>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h5 class="card-title h-font">Recent Activity</h5>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="table-dark">
                <tr>
                  <th>ID</th>
                  <th>Activity</th>
                  <th>Time</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($activity_q) > 0) {
                  while ($row = mysqli_fetch_assoc($activity_q)) {
                    echo '<tr>
                      <td>' . $row['id'] . '</td>
                      <td>' . $row['activity'] . '</td>
                      <td>' . date("g:i A", strtotime($row['time'])) . '</td>
                      <td><span class="badge ' . ($row['status'] == 'Completed' ? 'bg-success' : 'bg-warning text-dark') . '">' . $row['status'] . '</span></td>
                    </tr>';
                  }
                } else {
                  echo '<tr><td colspan="4" class="text-center">No activity found</td></tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Timeline -->
      <div class="col-lg-4 mt-4">
        <div class="card border-0 shadow-sm sticky-top" style="top: 80px;">
          <div class="card-body">
            <h5 class="card-title h-font">TIMELINE</h5>
            <div class="timeline">
              <div class="timeline-item">
                <div class="timeline-time">0:00:00</div>
              </div>
              <div class="timeline-item">
                <div class="timeline-time">8:30:00 ON!</div>
                <div class="timeline-content">
                  <div>Add Logs</div>
                  <div>CyberColor</div>
                  <div>Improve Code</div>
                  <div>Share Code Link</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php require('inc/scripts.php'); ?>
</body>
</html>
