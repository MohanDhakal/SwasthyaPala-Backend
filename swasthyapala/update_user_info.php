<?php

include('db_connect.php');
include('user.php');

$updatedUser=User::updateExistingUser();

//select user with the given id

if(isset($_GET['uid'])){
    $idToUpdate=$_GET['uid'];
}

//setters
if(isset($_GET['userName'])){
    $updatedUser->set_name($_GET['userName']);
}

if (isset($_GET['email'])){

    $updatedUser->set_email($_GET['email']);
}
if (isset($_GET['password'])){
    $updatedUser->set_phone($_GET['password']);
}
if (isset($_GET['phone'])){
    $updatedUser->set_password($_GET['phone']);
}

//getters
$email=$updatedUser->get_email();
$phone=$updatedUser->get_phone();
$password=$updatedUser->get_pass();
$name=$updatedUser->get_name();

//either update username and password together 
//or update every feild individually


if(!empty($name)&&!empty($password)){

    $updateQuery=
    "UPDATE user
    SET userName = '$name',
        password='$password'
    WHERE uid =$idToUpdate";
    showUpdateStatus($updateQuery,$conn);

}else if(!empty($phone)){
    $updateQuery=
    "UPDATE user
    SET phone = '$phone'
    WHERE uid =$idToUpdate";
    showUpdateStatus($updateQuery,$conn);


}else if(!empty($email)){
    $updateQuery=
    "UPDATE user
    SET email = '$email'
    WHERE uid =$idToUpdate";
    showUpdateStatus($updateQuery,$conn);
} else if(!empty($password)){
    $updateQuery=
    "UPDATE user
    SET password = '$password'
    WHERE uid =$idToUpdate";
    showUpdateStatus($updateQuery,$conn);

}else if(!empty($name)){
    $updateQuery=
    "UPDATE user
    SET userName = '$name'
    WHERE uid =$idToUpdate";
    showUpdateStatus($updateQuery,$conn);

}


function showUpdateStatus($updateQuery,$conn){

    if ($conn->query($updateQuery) === TRUE) {
        echo " Record updated successfully";
    } else {
        echo "Error: " . $updateQuery . "<br>" . $conn->error;
    }
    $conn->close();
    
}

?>