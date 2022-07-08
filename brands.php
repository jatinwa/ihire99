<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>brands</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <?php
    include './partials/_dbconnect.php';    
    include './partials/_header.php';
    $sql = "SELECT * FROM `brands`";

    $result = mysqli_query($conn, $sql);
    echo '<div class="container">';
    while ($row = mysqli_fetch_assoc($result)){
        echo '<div class="row my-4 mx-auto">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">'. $row['brand_name'] .'</h5>
              <p class="card-text">'. $row['brand_title'] .'</p>
              <p>'. $row['brand_description'] .'</p>
              <p style="color:grey">published at: '. $row['timestamp'] .'</p>
              <a href="brand.php?brand_id='.$row['brand_id'] .'" class="btn btn-primary">Jobs</a>
            </div>
          </div>
        </div>
      </div>';
    }
    echo '</div>';
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>