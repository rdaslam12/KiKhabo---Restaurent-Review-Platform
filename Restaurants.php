

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurants - KiKhabo</title>
  <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container my-5">
  <h2 class="fw-bold text-center mb-4">RESTAURANTS</h2>

  <div class="row">
    <!-- FILTER SECTION -->
    <div class="col-lg-3 col-md-4 mb-4">
      <div class="bg-white p-3 rounded shadow-sm">
        <h5 class="mb-3 fw-bold">FILTERS</h5>
        <form method="GET">
          <label class="form-label fw-bold">CHECK OUT RESTAURANTS</label>

          <div class="mb-3">
            <label class="form-label">Decoration</label>
            <select class="form-select" name="decoration">
              <option value="">All</option>
              <option value="Modern">Modern</option>
              <option value="Minimalist">Minimalist</option>
              <option value="Classic">Classic</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Food Type</label>
            <select class="form-select" name="food">
              <option value="">All</option>
              <option value="Pizza">Pizza</option>
              <option value="Burgers">Burgers</option>
              <option value="Seafood">Seafood</option>
              <option value="Chinese">Chinese</option>
              <option value="Indian">Indian</option>
              <option value="Italian">Italian</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Best For</label>
            <select class="form-select" name="tags">
              <option value="">All</option>
              <option value="Date">Date</option>
              <option value="Family_Outing">Family Outing</option>
              <option value="Anything">Anything</option>
              <option value="Gossiping">Gossiping</option>
              <option value="Friends_Squad">Friends Squad</option>
            </select>
          </div>

          <button type="submit" class="btn btn-dark w-100">Apply Filters</button>
        </form>
      </div>
    </div>

    <!-- RESTAURANT LIST -->
    <div class="col-lg-9 col-md-8">
      <?php
        $where = [];

        if (!empty($_GET['decoration'])) {
          $decoration = mysqli_real_escape_string($con, $_GET['decoration']);
          $where[] = "decoration = '$decoration'";
        }

        if (!empty($_GET['food'])) {
          $food = mysqli_real_escape_string($con, $_GET['food']);
          $where[] = "food = '$food'";
        }

        if (!empty($_GET['tags'])) {
          $tags = mysqli_real_escape_string($con, $_GET['tags']);
          $where[] = "tags LIKE '%$tags%'";
        }

        $sql = "SELECT * FROM restaurants";
        if (!empty($where)) {
          $sql .= " WHERE " . implode(" AND ", $where);
        }
        $sql .= " ORDER BY rating DESC";

        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
            echo <<<card
            <div class="card mb-4 shadow-sm border-0">
              <div class="row g-0 align-items-center">
                <div class="col-md-4">
card;

            // Image block with fallback
            $imagePath = !empty($row['image']) ? $row['image'] : 'default.jpg';
            echo '<img src="images/' . $imagePath . '" class="img-fluid rounded-start" alt="' . $row['r_name'] . ' Image">';

            echo <<<content
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title fw-bold">{$row['r_name']}</h5>
                    <p class="card-text mb-1 text-muted">Location: {$row['location']}</p>
                    <p class="card-text mb-1">{$row['food']} | {$row['tags']}</p>
                    <p class="card-text mb-2">Rating:
content;

            // Stars for rating
            for ($i = 0; $i < floor($row['rating']); $i++) {
              echo '<i class="bi bi-star-fill text-warning"></i>';
            }

            echo <<<buttons
                    </p>
                    <a href="#" class="btn btn-sm btn-outline-primary me-2">Details</a>
                    <a href="#" class="btn btn-sm btn-outline-dark">Review</a>
                  </div>
                </div>
              </div>
            </div>
buttons;
          }
        } else {
          echo "<h6 class='text-center'>No restaurants found!</h6>";
        }
      ?>
    </div>
  </div>
</div>

<?php require('inc/footer.php'); ?>
<?php require('admin/inc/scripts.php'); ?>

</body>
</html>
