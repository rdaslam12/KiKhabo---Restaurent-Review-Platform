<?php 

session_start();
echo "<!-- Debug: userLogin=" . ($_SESSION['userLogin'] ?? 'not set') . " -->";
?>

<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <div class="d-flex align-items-center">
        <button class="btn btn-sm btn-outline-light me-2 d-lg-none" id="menu-toggle">
            <i class="bi bi-list"></i> Menu
        </button>
        <h3 class="mb-0 h-font">Kikhabo</h3>
    </div>
    <div class="d-flex">
        <div class="input-group me-3" style="width: 250px;">
            <input type="text" class="form-control shadow-none" placeholder="Search...">
            <button class="btn btn-outline-light" type="button">
                <i class="bi bi-search"></i>
            </button>
        </div>
        <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>
</div>

<!-- Sidebar and Main Content -->
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div id="dashboard-menu" class="bg-dark p-0">
            <div class="d-flex flex-column h-100">
                <div class="flex-grow-1 px-3 py-4">
                    <h4 class="text-white px-3 mb-4 h-font">ADMIN PANEL</h4>
                    <nav class="nav flex-column gap-2">
                        <a class="nav-link text-white py-2 px-3 rounded active" href="dashboard.php">
                            <i class="bi bi-speedometer2 me-2"></i>Dashboard
                        </a>
                        <a class="nav-link text-white py-2 px-3 rounded" href="restaurants.php">
                            <i class="bi bi-shop me-2"></i>Restaurants
                        </a>
                        <a class="nav-link text-white py-2 px-3 rounded" href="ui.php">
                            <i class="bi bi-people me-2"></i>User Interface
                        </a>
                        <a class="nav-link text-white py-2 px-3 rounded" href="review.php">
                            <i class="bi bi-star me-2"></i>Reviews
                        </a>
                       
                       
                    </nav>
                </div>
                <div class="p-3 text-center text-muted small border-top border-secondary">
                    <span>▼ Admin Sidebar Panel ▼</span>
                </div>
            </div>
        </div>