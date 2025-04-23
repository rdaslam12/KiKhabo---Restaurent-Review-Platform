<?php
require('inc/essentials.php');
adminLogin();
require('inc/db_config.php');

$user = null;


if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$user) {
        alert('error', 'User not found.');
        redirect('ui.php');
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $full_name = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $pincode = filter_input(INPUT_POST, 'pincode', FILTER_SANITIZE_STRING);
    $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET full_name = ?, email = ?, phone = ?, address = ?, pincode = ?, dob = ?, password = ? WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssssi', $full_name, $email, $phone, $address, $pincode, $dob, $password, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    alert('success', 'User updated successfully.');
    redirect('ui.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
  <div class="row">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">

      <h3 class="mb-4">Edit User</h3>
      <form method="POST">
        <input type="hidden" name="id" value="<?= $user['user_id'] ?>">

        <div class="mb-3">
            <label for="full_name">Full Name</label>
            <input class="form-control" id="full_name" type="text" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" id="email" type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input class="form-control" id="phone" type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <input class="form-control" id="address" type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="pincode">Pincode</label>
            <input class="form-control" id="pincode" type="text" name="pincode" value="<?= htmlspecialchars($user['pincode']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="dob">Date of Birth</label>
            <input class="form-control" id="dob" type="date" name="dob" value="<?= htmlspecialchars($user['dob']) ?>" required>
        </div>
        

        <button class="btn btn-primary" type="submit">Update</button>
        <a href="ui.php" class="btn btn-secondary">Cancel</a>
      </form>

    </div>
  </div>
</div>

<?php require('inc/scripts.php'); ?>
</body>
</html>
