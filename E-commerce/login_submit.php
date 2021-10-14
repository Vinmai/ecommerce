<?php
require 'includes/common.php';
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$sec_pass = md5($password);

$user_login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$sec_pass'";
$user_login_submit = mysqli_query($con, $user_login_query) or die(mysqli_error($con));

if(mysqli_num_rows($user_login_submit) == 0){
    echo "No user exists. Please check the entered values";
}else{
    $row = mysqli_fetch_array($user_login_submit);
    $_SESSION["email"] = $email;
    $_SESSION["id"] = $row["id"];

    header('location: products.php');
}

?>
