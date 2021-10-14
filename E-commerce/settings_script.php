<?php
require 'includes/common.php';
if(!isset($_SESSION["email"])){
    header("location: index.php");
}
$old_pass = mysqli_real_escape_string($con, $_POST['old_password']);
$old_password = MD5($old_pass);

$new_pass = mysqli_real_escape_string($con, $_POST['new_password']);
$new_password = MD5($new_pass);

$rep_pass = mysqli_real_escape_string($con, $_POST['retype_new_password']);
$rep_password = MD5($rep_pass);

$query = "SELECT email, password FROM users WHERE email ='" . $_SESSION['email'] . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);

$orig_pass = $row['password'];

if ($new_password != $rep_password) {
    echo("The two passwords don't match.");
    header('location: settings.php');
} else {
    if ($old_password == $orig_pass) {
        $query = "UPDATE  users SET password = '" . $new_password . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die(mysqli_error($con));
        echo("Password Updated Successfully'");
        header('location: settings.php');
    } else{
        echo("Wrong Old Password");
        header('location: settings.php');
    }
}
?>