<?php
require 'includes/common.php';

$email = mysqli_real_escape_string($con, $_POST['email']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$sec_pass = md5($password);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$query1 = "SELECT id FROM users WHERE email = '$email' AND password = '$sec_pass'";
$query2 = "INSERT INTO users (name, email, password, contact, city, address) VALUES ('$name', '$email', '$sec_pass', '$contact', '$city', '$address')";
$result = mysqli_query($con, $query1) or die(mysqli_error($con));
if(mysqli_num_rows($result) > 0){
    echo "Email id already exists. Please Login";
}else{
    $result = mysqli_query($con, $query2);
    $_SESSION['email'] = $email;
    $_SESSION['id'] = mysqli_insert_id($con);

    header('location: products.php');
}

?>