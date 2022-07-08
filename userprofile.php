<?php
$applicant_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <?php
    include './partials/_header.php';
    ?>
<div class="container">
    <div class="row">
        <div class="col-6">
        <h2 class="my-4 mx-4" >Below are the brands you have applied</h2>
<?php
include './partials/_dbconnect.php';
$sql = "SELECT * FROM `applications` WHERE `applicant_id` = '$applicant_id'";

$result = mysqli_query($conn, $sql);



while ($row = mysqli_fetch_assoc($result)){
    $brand_id = $row['applied_to_id'];
    $newsql = "SELECT * FROM `brands` WHERE `brand_id` = '$brand_id'";
    $newresult = mysqli_query($conn, $newsql);
    while ($row1 = mysqli_fetch_assoc($newresult)){
        $brand_name = $row1['brand_name'];
        $brand_title = $row1['brand_title'];
    }
    echo '<div class="container my-4">
   <div class="bg-light p-5 rounded">
       <h1>' . $brand_name . '</h1>
       <p class="lead">' . $brand_title . '</p>
       <p style="color: grey"> '. $row['timestamp'] .' </p>
       <a class="btn btn-lg btn-primary" href="/sampleproject/profile.php?applicant_id='. $applicant_id .'&applied_to_id='. $brand_id .'" role="button">View »</a>
   </div>
   </div>';
}
?>
</div>

<div class="col-6">
<h2 class="my-4 mx-2" >Brands you are shortlisted in</h2>
<?php
$sql = "SELECT * FROM `shortlist` WHERE `user_id` = '$applicant_id'";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
    $brand_id = $row['brand_id'];
    $timestamp = $row['timestamp'];
    $newsql = "SELECT * FROM `brands` WHERE `brand_id` = '$brand_id'" ;
    $newresult = mysqli_query($conn, $newsql);
    if(mysqli_num_rows($newresult)){
    while ($row1 = mysqli_fetch_assoc($newresult)){
            $brand_name = $row1['brand_name'];
            $brand_title = $row1['brand_title'];
            echo '<div class="container my-4">
   <div class="bg-light p-5 rounded">
       <h1>' . $brand_name . '</h1>
       <p class="lead">' . $brand_title . '</p>
       <p> you are shortlisted we will inform you for further process soon.</p>
    <p style="color: grey"> '. $timestamp .' </p>
   </div>
   </div>';
    }
}
}
?>
</div>
 </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>