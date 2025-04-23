
<?php
include('admin/inc/essentials.php');
include('admin/inc/db_config.php');
include('admin/inc/links.php');
session_start();
if (isset($_POST['register'])) {

    $name = $_POST['full_name'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email'];
    $dob = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $password = $_POST['password'];
    $hash = password_hash("$password", PASSWORD_BCRYPT);

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) >= 1) {
        session_destroy();
        echo "<script>alert('Account already exists!');</script>";
        redirect('index.php');
    } else {
        $sql = "INSERT INTO `users` (`full_name`, `phone`, `dob`, `password`, `email`, `address`,`pincode`) VALUES ('$name','$phone', '$dob','$hash', '$email', '$address', '$pincode')";
        $sql_run = mysqli_query($con, $sql);

        if ($sql_run) {
            session_destroy();
            echo "<script>alert('Account Created:D');</script>";
            redirect('  .php');
        } else {
            session_destroy();
            echo "<script>alert('Error, Server Down :(');</script>";
        }
    }
}

?>

<?php

