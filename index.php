<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sample-project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    
    <!-- header -->
    <?php include './partials/_dbconnect.php' ?>
    <?php include './partials/_header.php'; ?>
    <!-- header alerts -->
    <?php
    if(isset($_GET['error']) && $_GET['error'] != false){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong> ' . $_GET['error'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if(isset($_GET['success']) && $_GET['success'] != false){
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>SUCCESS!</strong> ' . $_GET['success'] . '
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
    }
    ?>
    <!-- login forms -->
    <?php 
    if(!isset($_SESSION['loggedin'])){
    include './partials/_loginform.php';
    }
    ?>
    <!-- brand form for admins -->
    
    <?php
    if(isset($_SESSION['admin-user']) && $_SESSION['admin-user'] == 'admin'){
      echo '<h1 class="text-center my-4">Add a new brand below!</h1>';
     include './partials/_brandform.php'; 
    }
     ?>

     <!-- brands  -->
     <?php
     if(isset($_SESSION['admin-user']) && $_SESSION['admin-user'] == 'user'){
      echo '<h1 class="text-center my-4">ALL JOBS</h1>';
      include './partials/_brands.php';
     }
     ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>