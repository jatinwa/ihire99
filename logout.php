<?php
$success = false;
session_start();
session_unset();
session_destroy();
$success = 'you are successfully logged out';
header('Location: index.php?success=' . $success . '');
?>