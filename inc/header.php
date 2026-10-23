<?php 
require('admin/inc/db_config.php');
require_once('admin/inc/essentials.php');
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a href="index.php">
            <img src="images/kikhabologo.png" alt="logo" style="width:100px;height:60px;">
        </a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  me-2" href="restaurants.php">Restaurants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="review.php">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="topcharts.php">Top Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <?php
                        if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true){
                           echo' <a class="nav-link me-2" href="ui.php">User interface</a>';
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="admin/index.php">Admin Login</a>
                </li>
            </ul>
            <div class="d-flex">
            <?php
                if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                    echo '<span class="navbar-text me-3">Welcome, ' . htmlspecialchars($_SESSION['userName']) . '</span>';
                    echo '<form action="admin/logout.php" method="POST" class="d-inline">';
                    echo '<button type="submit" class="btn btn-outline-dark shadow-none">Logout</button>';
                    echo '</form>';
                } else {
                    echo '<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>';
                    echo '<button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>

<!--Login Option Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id ="login" action="login.php" method="POST" >
                <div class="modal-header">
                    <h5 class="modal-title d-flex allign-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> USER LOGIN
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" id="email" name="email" class="form-control shadow-none">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" name="login" class="btn btn-dark shadow-none">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Register Modal -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <form id ="register" action="register.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-person-add fs-3 me-2"></i>
                    USER Registration
                </h5>
                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                    Note: Your Details must match with Email ID (First Name etc)
                </span>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" id="full_name" name="full_name" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 p-0 mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-12 p-0 mb-3">
                            <label class="form-label">Address</label>
                            <textarea id="address" name="address" class="form-control shadow-none" rows="1" required></textarea>
                        </div>
                        <div class="col-md-6 ps-0">
                            <label class="form-label">Pincode</label>
                            <input type="text" id="pincode" name="pincode" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 ps-0">
                            <label class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button type="submit" name="register" class="btn btn-dark shadow-none">REGISTER</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>