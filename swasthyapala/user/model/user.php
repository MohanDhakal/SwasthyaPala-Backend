<?php
include('address.php');


class User{

  //properties
  private $userName,$password,$phone,$email;
  private $addressId;

  function __construct(){
 
  }

  static function createNewUser($name,$pass,$phone,$email){
    $newUser=new User();
    $newUser->userName=$name;
    $newUser->password=$pass;
    $newUser->phone=$phone;
    $newUser->email=$email;
    return $newUser;
  }

  static function updateExistingUserWithAddressId(){
    $updatedUser=new User();
    return $updatedUser;


  }
  static function updateExistingUser(){
    $updatedUser=new User();
    return $updatedUser;
 
 
  }

  function set_name($userName){
    $this->userName=$userName;
  }
  function set_email($email){
    $this->email=$email;
  }
  function set_password($password){
    $this->password=$password;
  }
  function set_phone($phone){
    $this->phone=$phone;
  }
  //setter for address id
    function set_adress_id($id){
    $this->addressId=$id;
  }

   function get_name(){  
  return $this->userName; 
  }


  function get_pass(){
    return $this->password;
  }
  
  function get_address_id(){
    return $this->addressId;
  }
  
  function get_phone(){
    return $this->phone;
  }
  
  
  function get_email(){
    return $this->email;
  }

  function insertUser($user){

    include('../db_connect.php');

    $insert_query= 
    "INSERT INTO user (userName, password,email,phone)
    VALUES ('$user->userName', '$user->password',
    '$user->email','$user->phone')";
    
    if ($conn->query($insert_query) === TRUE) {
    
      $conn->close();
      return true;

    } else {
    
      $conn->close();
      return false;
    }
  }


 function updateUser($userId){
  include('../db_connect.php');

  $addrSql="SELECT addressId FROM `address` WHERE uid=$userId";
  $result = $conn->query($addrSql);
  
  

  $addressIdofGivenUser;
  
  if ($result->num_rows > 0) {
   $addressIdofGivenUser= ($result->fetch_assoc())["addressId"];
  
  }

  $updateQuery= "UPDATE user  
    SET addressId = $addressIdofGivenUser
    WHERE uid = $userId";


  if ($conn->query($updateQuery) === TRUE) {
      $conn->close();   
      return true;
  } else {
      $conn->close();
      echo "Error: " . $updateQuery . "<br>" . $conn->error;
      return false;
  }




  }

}

?>
