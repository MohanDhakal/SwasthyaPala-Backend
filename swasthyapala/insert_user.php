<?php

include('db_connect.php');
include('user.php');

//creating object with factory method
$newUser= User::createNewUser($_GET['userName'],$_GET['password'],$_GET['phone'],$_GET['email']);

//insert into user table

$name=$newUser->get_name();
$password=$newUser->get_pass();
$email=$newUser->get_email();
$phone=$newUser->get_phone();

$insert_query= 
"INSERT INTO user (userName, password,email,phone)
VALUES ('$name', '$password','$email','$phone')";

if ($conn->query($insert_query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insert_query . "<br>" . $conn->error;
}

$conn->close();
?>