<?php
$error = false;
$success = false;
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
   include './partials/_dbconnect.php';
   $username = $_POST['username'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $tablename = $_POST['tablename'];

   if($tablename == 'admins'){
    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >0){
        $error = 'user cannot be signup as admin ';
        exit();
    }
   }

   $sql = "SELECT * FROM `" . $tablename . "` WHERE `username`= '$username'";

   $result = mysqli_query($conn,$sql);

   $num = mysqli_num_rows($result);

   if($num>0){
      $error = 'user with this username already exists please enter the different username';
   }
   else{
    if($password != $cpassword){
        $error = 'passwords do not match please enter the same password';
    }
    else{
        $sql = "INSERT INTO `" . $tablename . "` (`username`, `password`, `timestamp`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn,$sql);
        if($result){
           $success = 'signup successful please login to continue';
        }
        else{
            $success = 'signup failed please try again';
        }
    }
   }
  header('Location: index.php?success=' .$success. '&error=' .$error. '');
 }
?>