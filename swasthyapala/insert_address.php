<?php
include('db_connect.php');
include('address.php');

$newAddress=new UserAddress($_GET['lattitude'],$_GET['longitude']);

//mysqli auery
$lat=$newAddress->get_lat();
$long=$newAddress->get_long();

//this is required parameter in apis

$user_id=$_GET['uid'];

$sql="INSERT INTO address (longitude,lattitude,uid)
VALUES ($lat, $long,$user_id)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>