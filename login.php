<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('admin/inc/essentials.php');
require('admin/inc/db_config.php');

session_start();
if((isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true))
{
    redirect('index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.8">
    <title>User Login Panel</title>
    <?php require('admin/inc/links.php'); ?>
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>
<body class="bg-light">


<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE `email`='$email'";
    $run = mysqli_query($con,$query);

    if(mysqli_num_rows($run)>0){
        while($row = mysqli_fetch_assoc($run)){
            
            if(password_verify($password,$row['password'])){
            
                session_start();
                $_SESSION['userLogin']  = true;
                $_SESSION['userID'] = $row['user_id'];
                $_SESSION['userName'] = $row['full_name'];

                echo "<script>alert('Login Successful!');</script>";
                if ((isset($_SESSION['userLogin'])) && $_SESSION['userLogin'] == true){
                    redirect("index.php");
                }
                
            } else {
                session_destroy();
                echo "<script>alert('Login failed - invalid credentials!');</script>";
                redirect("index.php");
            }
            
        }
    }
}
?>

<?php require('admin/inc/scripts.php'); ?>

</body>
</html>