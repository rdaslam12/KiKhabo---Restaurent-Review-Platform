<?php require('inc/essentials.php'); adminLogin(); require('inc/db_config.php'); // Include the database config ?> <!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Admin Panel - Users</title> <?php require('inc/links.php'); ?> <style> /* Add your custom styles here */ </style> </head> <body class="bg-light">

<!-- Top Navbar -->

<?php require('inc/header.php'); ?>


<div class="container-fluid" id="main-content">

    <div class="row">

    <div class="col-lg-10 ms-auto p-4 overflow-hidden">

        <h3 class="mb-4">Users</h3>
        <div class="mb-3">
            <a href="add_user.php" class="btn btn-primary">Add User</a>
        </div>


            <?php

            // Fetch data from the users table

            $sql = "SELECT * FROM users";

            $result = mysqli_query($con, $sql);


            if ($result && mysqli_num_rows($result) > 0) {

                echo '<table class="table table-striped">';

                echo '<thead>';

                echo '<tr>';

                echo '<th>User ID</th>';

                echo '<th>Full Name</th>';

                echo '<th>Email</th>';

                echo '<th>Phone</th>';

                echo '<th>Address</th>';



                echo '<th>DOB</th>';



                echo '<th>Actions</th>';  // New column for actions

                echo '</tr>';

                echo '</thead>';

                echo '<tbody>';


                while ($row = mysqli_fetch_assoc($result)) {

                    echo '<tr>';

                    echo '<td>' . htmlspecialchars($row['user_id']) . '</td>';

                    echo '<td>' . htmlspecialchars($row['full_name']) . '</td>';

                    echo '<td>' . htmlspecialchars($row['email']) . '</td>';

                    echo '<td>' . htmlspecialchars($row['phone']) . '</td>';

                    echo '<td>' . htmlspecialchars($row['address']) . '</td>';

                    

                    echo '<td>' . htmlspecialchars($row['dob']) . '</td>';

                    

                    echo '<td>

                            <a href="edit_user.php?id=' . htmlspecialchars($row['user_id']) . '" class="btn btn-warning">Edit</a>

                            <a href="delete_user.php?id=' . htmlspecialchars($row['user_id']) . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this user?\');">Delete</a>

                          </td>';

                    echo '</tr>';

                }


                echo '</tbody>';

                echo '</table>';

            } else {

                echo '<p>No users found.</p>';

            }


            mysqli_close($con); // Close the database connection

            ?>

        </div>

    </div>

</div>     


<?php require('inc/scripts.php'); ?>

</body> </html>