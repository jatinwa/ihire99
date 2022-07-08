<?php
$success = false;
$error = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include './partials/_dbconnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";

    $result  = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0 ){
        $error = 'invalid username please enter the correct username'; 
    }
    else{
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            if($row['password'] != $password){
              $error = 'incorrct password pleas enter the correct password to login';
            }
            else{
                session_start();
                $_SESSION['loggedin']  = true;
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $user_id;
                $_SESSION['admin-user'] = 'user';
                $success = 'you are logged in successfully';
            }
        }
    }
    header('Location: index.php?success=' . $success .'&error=' . $error .'');
}
?>