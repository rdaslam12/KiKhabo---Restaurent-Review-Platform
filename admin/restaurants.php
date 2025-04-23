<?php 
require('inc/essentials.php'); 
adminLogin(); 
require('inc/db_config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Restaurants</title>
    <?php require('inc/links.php'); ?>
    <style>
        
    </style>
</head>
<body class="bg-light">

    <!-- Top Navbar eta -->
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Restaurants</h3>
                <div class="mb-3">
                <a href="add_restaurant.php" class="btn btn-primary">Add Restaurant</a>
            </div>

                <?php
                
                $sql = "SELECT * FROM restaurants";
                $result = mysqli_query($con, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    echo '<table class="table table-striped">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Restaurant ID</th>';
                    echo '<th>Name</th>';
                    echo '<th>Location</th>';
                    echo '<th>Food Type</th>';
                    echo '<th>Decoration Style</th>';
                    echo '<th>Tags</th>';
                    echo '<th>Minimum_Price</th>';
                    echo '<th>Average Rating</th>';
                    echo '<th>Actions</th>';  
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['restaurant_id']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['r_name']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['location']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['food']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['decoration']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['tags']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['price']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['rating']) . '</td>';
                        echo '<td>
                                <a href="edit_restaurant.php?id=' . htmlspecialchars($row['restaurant_id']) . '" class="btn btn-warning">Edit</a>
                                <a href="delete_restaurant.php?id=' . htmlspecialchars($row['restaurant_id']) . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this restaurant?\');">Delete</a>
                              </td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<p>No restaurants found.</p>';
                }

                mysqli_close($con); 
                ?>
            </div>
        </div>
    </div>     

    <?php require('inc/scripts.php'); ?>

</body>
</html>