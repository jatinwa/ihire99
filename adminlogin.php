<?php
$success = false;
$error = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include './partials/_dbconnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admins` WHERE `username` = '$username'";

    $result  = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0 ){
        $error = 'invalid username please enter the correct username'; 
    }
    else{
        while($row = mysqli_fetch_assoc($result)){
            $id  = $row['admin_id'];
            if($row['password'] != $password){
              $error = 'incorrect password please enter the correct password to continue';
            }
            else{
                session_start();
                $_SESSION['loggedin']  = true;
                $_SESSION['username'] = $username;
                $_SESSION['brand_by'] = $id;
                $_SESSION['admin-user'] = 'admin';
                $success = 'you logged in successfully';
            }
        }
    }
    header('Location: index.php?success=' . $success. '&error=' . $error . '');
}
?>