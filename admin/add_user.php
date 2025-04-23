<?php 
require('inc/essentials.php'); 
adminLogin(); 
require('inc/db_config.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $pincode = filter_input(INPUT_POST, 'pincode', FILTER_SANITIZE_STRING);
    $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (full_name, email, phone, address, pincode, dob, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sssssss', $full_name, $email, $phone, $address, $pincode, $dob, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ui.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add User</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
  <div class="row">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">

      <h3 class="mb-4">Add User</h3>
      <form method="POST">
        <div class="mb-3">
            <label for="full_name">Full Name</label>
            <input class="form-control" id="full_name" type="text" name="full_name" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" id="email" type="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input class="form-control" id="phone" type="text" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <input class="form-control" id="address" type="text" name="address" required>
        </div>
        <div class="mb-3">
            <label for="pincode">Pincode</label>
            <input class="form-control" id="pincode" type="text" name="pincode" required>
        </div>
        <div class="mb-3">
            <label for="dob">Date of Birth</label>
            <input class="form-control" id="dob" type="date" name="dob" required>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" id="password" type="password" name="password" required>
        </div>

        <button class="btn btn-success" type="submit">Add User</button>
      </form>

    </div>
  </div>
</div>

<?php require('inc/scripts.php'); ?>
</body>
</html>
