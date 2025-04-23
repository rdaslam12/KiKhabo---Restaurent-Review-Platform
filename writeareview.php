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
<?php require('inc/header.php');?>


    <div class="container mt-4">
        <h2 class="h-font">Write a Review</h2>
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <form>
                    <div class="mb-3">
                        <label for="restaurantName" class="form-label">Restaurant Name</label>
                        <input type="text" class="form-control shadow-none" id="restaurantName" placeholder="Enter the restaurant name" required>
                    </div>
                    <div class="mb-3">
                        <label for="reviewText" class="form-label">Your Review</label>
                        <textarea class="form-control shadow-none" id="reviewText" rows="4" placeholder="Write your review here..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating (out of 5)</label>
                        <input type="number" class="form-control shadow-none" id="rating" min="0" max="5" step="0.1" placeholder="e.g. 4.5" required>
                    </div>
                    <button type="submit" class="btn btn-dark shadow-none">Submit Review</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>