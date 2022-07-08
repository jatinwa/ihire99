<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <?php
    include './partials/_header.php';
    include './partials/_dbconnect.php';
    if(isset($_GET['applied_to_id'])){
        $applied_to_id = $_GET['applied_to_id'];
        $sql = "SELECT * FROM `applications` WHERE `applied_to_id`  = '$applied_to_id'";
            $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            echo '<div class="container my-4">
            <div class="bg-light p-5 rounded">
                <h1>' . $row['username'] . '</h1>
                <p class="lead">' . $row['question'] . '</p>
                <a class="btn btn-lg btn-primary" href="/sampleproject/profile.php?applicant_id=' . $row['applicant_id'] . '&applied_to_id='. $row['applied_to_id'] . '" role="button">View Application »</a>
            </div>
            </div>';
        }
    }
    else{
        $id = $_SESSION['brand_by'];
        $sql1 = "SELECT * FROM `brands` WHERE `brand_by` = '$id'";
        $result1 = mysqli_query($conn, $sql1);
        while ($row1 = mysqli_fetch_assoc($result1)){
            $applied_to_id = $row1['brand_id'];
            $sql = "SELECT * FROM `applications` WHERE `applied_to_id`  = '$applied_to_id'";
            $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            echo '<div class="container my-4">
            <div class="bg-light p-5 rounded">
                <h1>' . $row['username'] . '</h1>
                <p class="lead">' . $row['question'] . '</p>
                <a class="btn btn-lg btn-primary" href="/sampleproject/profile.php?applicant_id=' . $row['applicant_id'] . '&applied_to_id='. $row['applied_to_id'] . '" role="button">View Application »</a>
            </div>
            </div>';
        }
        }
    }

    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>