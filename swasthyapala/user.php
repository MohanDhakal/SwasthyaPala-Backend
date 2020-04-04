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

}

?>
