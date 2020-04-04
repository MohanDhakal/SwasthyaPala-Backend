<?php
$servername = "localhost";
$username = "mohan";
$password = "dhakalMohan@50";
$dbname="swasthyapala";

//create connection 

$conn=new mysqli($servername,$username,$password,$dbname);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>