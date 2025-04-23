<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KiKhabo.com</title>
   <?php include('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    

    <style>
        
        .landing-section {
            width: 100%;
            height: 100vh; 
            background: url('images/landingpage.png') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            position: relative; 
        }
        .welcome-text {
            position: absolute;
            right: 12px; 
            top: 30%; 
            transform: translate(-10%); 
            color: white;
            font-size: 46px;
            font-family: "Lexend Deca", sans-serif;
            z-index: 1; 
        }


        .swiper {
        width: 100%;
        height: 600px; 
        }
        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .swiper-container {
            margin-top: 0; 
        }


        
    </style>
</head>
<body>
    <!-- This is the Navigation Bar -->

    <?php require('inc/header.php');?>
    <div class="landing-section">
        <h1 class="welcome-text">Welcome to KiKhabo.com</h1>
    </div>

    <!-- Caraousal with the images -->
    <div class="container-fluid"> 
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="images/carousel/1.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/2.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/3.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/4.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/5.jpg" />
            </div>
            </div>
        </div>
    </div>
    <!-- Contact Us -->
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
 
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <script>
    var swiper = new Swiper(".swiper", {
        loop: true,
        spaceBetween: 30,
        effect: "fade",
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
  </script>

</body>
</html>















































<!-- Dropped Code : Restaurant Availability  -->
 <!-- <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5>Check Restaurant Availibility</h5>
                <form >
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="form-labe" style="font-weight:500">Reservation Date</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="co lg 3">
                            <label class="form-labe" style="font-weight:500">Number of people</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                                <option value="5">Five</option>
                                <option value="6">Six</option>
                              </select>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" class="btn-text white shadow-none custom-bg">Submit </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>  -->

