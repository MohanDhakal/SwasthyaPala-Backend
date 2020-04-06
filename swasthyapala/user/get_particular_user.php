<?php
include('../db_connect.php');

//get user with userid from api
$userId=$_GET['uid'] ;

$select_user=" SELECT * FROM user WHERE uid=$userId ";

$result = $conn->query($select_user);
$row = $result->fetch_assoc();
echo (json_encode($row));


?>