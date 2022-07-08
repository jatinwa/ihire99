<?php
include './partials/_dbconnect.php';
if (isset($_GET['id']) && $_GET['brand_id']) {
  $id = $_GET['id'];
  $brand_id = $_GET['brand_id'];
  $sql = "SELECT * FROM `users` WHERE `user_id` = '$id'";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['username'];
  }
  $checksql = "SELECT * FROM `shortlist` WHERE `user_id` = '$id' AND `brand_id` = '$brand_id'";
  $checkresult = mysqli_query($conn, $checksql);
  if(mysqli_num_rows($checkresult) == 0){
    $sql = "INSERT INTO `shortlist` (`user_id`, `username`, `status`, `timestamp`, `brand_id`) VALUES ('$id', '$username', 'shortlisted', current_timestamp(), '$brand_id')";
    $result = mysqli_query($conn, $sql);
  
    if ($result) {
      $success = ' . $username . shortlisted successfully';
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shortlist</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <?php
  include './partials/_header.php';
  $id = $_SESSION['brand_by'];
  $sql1 = "SELECT * FROM `brands` WHERE `brand_by` = '$id'";
  $result1 = mysqli_query($conn, $sql1);
  while ($row = mysqli_fetch_assoc($result1)) {
    $b_id = $row['brand_id'];
    $sql = "SELECT * FROM `shortlist` WHERE `brand_id` = '$b_id'";
    $result = mysqli_query($conn, $sql);
    while ($row1 = mysqli_fetch_assoc($result)) {
      echo ' <div class="container my-4">
          <div class="card">
        <div class="card-header">
          shortlisted
        </div>
        <div class="card-body">
          <h5 class="card-title">Candidate name</h5>
          <h6>' . $row1['username'] . '</h6>
          <a href="profile.php?applicant_id=' . $row1['user_id'] . '&applied_to_id='. $row1['brand_id'] .'" class="btn btn-primary">view profile</a>
          <a href="remove.php?id=' . $row1['shortlist_id'] . '" class="btn btn-primary">remove from shorlist</a>
          <p class="">'. $row1['timestamp'] .'</p>
        </div>
      </div>
      </div>';
    }
  }
  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>