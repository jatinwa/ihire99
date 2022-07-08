<?php

$sql = "SELECT * FROM `brands`";
$result = mysqli_query($conn, $sql);

if($result){
    while($row = mysqli_fetch_array($result)){
        echo '<div class="container my-4">
        <div class="bg-light p-5 rounded">
            <h1>' . $row['brand_name'] . '</h1>
            <p class="lead">' . $row['brand_title'] . '</p>
            <p style="color: grey"> Published at: '. $row['timestamp'] .'</p>
            <a class="btn btn-lg btn-primary" href="/sampleproject/brand.php?brand_id=' . $row['brand_id'] . '" role="button">View »</a>
        </div>
        </div>';
    }
}
?>

