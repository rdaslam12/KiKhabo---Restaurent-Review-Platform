<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write a Review - KiKhabo.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            font-family: "Montserrat", sans-serif;
        }
        .h-font {
            font-family: "Lexend Deca", sans-serif;
        }
        .custom-bg {
            background-color: #2ec1ac;
        }
        .custom-bg:hover {
            background-color: #279e8c;
        }
    </style>
</head>
<body>
    <!-- This is the Navigation Bar -->

    <?php require('inc/header.php');?>

    <h2 class="mt-5 pt-4 text-center fw-bold h-front">Contact US</h2>
     <div class="container">
        <div class="row">
            <div class="col-lg-8 md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
              <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.0980914516545!2d90.4255566!3d23.815110699999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64c103a8093%3A0xd660a4f50365294a!2sNorth%20South%20University!5e0!3m2!1sen!2sbd!4v1741373741709!5m2!1sen!2sbd" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call Us</h5>
                    <a href="tel: +8801234567890" class="d-inline block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i> +8801234567890
                    </a>
                    <a href="tel: +8801234567890" class="d-inline block text-decoration-none text-dark">
                    <br>
                    <i class="bi bi-telephone-fill"></i> +8801234567890
                    </a>

                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow Us</h5>
                    <a href="#" class="d-inline block mb-3 me-2">
                    <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-facebook me-1"></i> Facebook</span>
                    </a>
                    <br>
                    <a href="#" class="d-inline block mb-3">
                    <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram me-1"></i> Instragram</span>
                    </a>

                </div>

            </div>
        </div>
     </div>


<!-- Footer -->
   <?php require('inc/footer.php'); ?>
</body>
</html>