

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Interface - KiKhabo</title>
    <?php require('inc/links.php'); ?>
    <style>
        .user-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .user-card h5 {
            margin: 0 0 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php require('inc/header.php'); ?>

            <div class="container my-5">
                <h3 class="mb-4">User Profiles</h3>
                <div class="row justify-content-center">
                    <?php
                    $query = "SELECT full_name, email, phone FROM users";
                    $result = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($result)) {
                        echo <<<user
                        <div class="col-md-6 col-lg-5 mb-4">
                            <div class="user-card shadow-sm">
                                <h5>{$row['full_name']}</h5>
                                <p><strong>Email:</strong> {$row['email']}</p>
                                <p><strong>Phone:</strong> {$row['phone']}</p>
                            </div>
                        </div>
user;
                    }
                    ?>
                </div>
            </div>


<?php require('admin/inc/scripts.php'); ?>
<?php require('inc/footer.php'); ?>
</body>
</html>
