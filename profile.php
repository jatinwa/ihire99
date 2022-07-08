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
    include './partials/_dbconnect.php';
    include './partials/_header.php';
    
    $id = $_GET['applicant_id'];
    $brand_id = $_GET['applied_to_id'];
    $sql = "SELECT * FROM `applications` WHERE `applicant_id` = '$id' AND `applied_to_id` = '$brand_id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
       echo ' <div class="container my-4">
       <div class="card">
     <div class="card-header">
       '. $row['username'] .'
     </div>
     <div class="card-body">
       <h5 class="card-title">Why should we hire you?</h5>
       <h6>'. $row['question'] .'</h6>
       <h5>Links to portfolio or projects</h5>
       <h6>'. $row['links'] .'</h6>' ;
         if($_SESSION['admin-user']  == 'admin') {
        echo '<a href="shortlist.php?id='.$row['applicant_id'].'&brand_id='.$row['applied_to_id'].'" class="btn btn-primary">Shortlist</a>';
         }
    echo '</div>
   </div>
   </div>';
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>