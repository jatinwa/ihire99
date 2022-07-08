<?php
include './partials/_dbconnect.php';

$id = $_GET['id'];
$sql = "DELETE FROM `shortlist` WHERE `shortlist`.`shortlist_id` = '$id'";

$result = mysqli_query($conn, $sql);

if($result){
    header('Location: shortlist.php');
}
?>