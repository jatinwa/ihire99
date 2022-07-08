<?php
include './partials/_header.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  include './partials/_dbconnect.php';
  $success = false;
  $error = false;
  $id = $_GET['brand_id'];
  $applicant_id = $_SESSION['id'];
  $applied_to_id = $id;
  $username = $_POST['username'];
  $question = $_POST['question'];
  $links = $_POST['links'];

  $checksql = "SELECT * FROM `applications` WHERE `applicant_id` = '$applicant_id' AND `applied_to_id` = '$applied_to_id'";
  $checkresult = mysqli_query($conn, $checksql);
  if(mysqli_num_rows($checkresult) == 1){
    $error = 'already applied';
  }
  else{
    $sql = "INSERT INTO `applications` (`applicant_id`, `applied_to_id`, `username`, `question`, `links`, `timestamp`) VALUES ('$applicant_id', '$applied_to_id', '$username', '$question', '$links', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result){
      $success = 'You are successfully applied to this application';
    }
    else{
      $error = 'encounter an error while applying please try again later';
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
    <title>brand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
    include './partials/_dbconnect.php';
    if(isset($success) && $success == true){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> '. $success .'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if(isset($error) && $error == true){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> '. $error .'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <?php
    $id = $_GET['brand_id'];
     

    $sql = "SELECT * FROM  `brands` WHERE `brand_id` = '$id'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo '<h1 class="text-center mt-2">' . $row['brand_name'] . '</h1>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-lg-5 py-5">
    <div class="col-lg-7 text-center text-lg-start">
      <h1 class="display-4 fw-bold lh-1 mb-3">' . $row['brand_title'] . '</h1>
      <p class="col-lg-10 fs-4">' . $row['brand_description'] . '</p>
    </div>
    <div class="col-md-10 mx-auto col-lg-5">
      <form class="p-4 p-md-5 border rounded-3 bg-light" action="'. $_SERVER['REQUEST_URI'] .'" method="post">
        <div class="mb-3">
        <label class="my-2" for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
        <div>
        <label  class="my-2" for="question">Why should we hire you?</label>
       <textarea class="form-control" id="question" name="question" style="height: 100px"></textarea>
       </div>
        <div class="mb-3">
        <div>
        <label  class="my-2" for="links">Drop links of your portfolio or projects links if any.</label>
     <textarea class="form-control" id="links" name="links" style="height: 100px"></textarea>
      </div>
        <button class="w-100 btn btn-lg btn-primary my-2" type="submit">Apply</button>
        <hr class="my-4">
      </form>
    </div>
  </div>
</div>';
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>