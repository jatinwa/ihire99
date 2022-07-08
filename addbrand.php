<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include './partials/_dbconnect.php';
    session_start();
    $brandname = $_POST['name'];
    $brandtitle = $_POST['title'];
    $branddescription = $_POST['description'];
    if(isset($_SESSION['brand_by'])){
      $brandby = $_SESSION['brand_by'];
    }
    $sql = "INSERT INTO `brands` (`brand_name`, `brand_title`, `brand_description`, `brand_by`, `timestamp`) VALUES ('$brandname', '$brandtitle', '$branddescription', $brandby , current_timestamp())";

    $result = mysqli_query($conn, $sql);
    if($result ){
        $success = 'new job posted successfully';
    }
    header('Location: index.php?success=' . $success . '');
}


?>