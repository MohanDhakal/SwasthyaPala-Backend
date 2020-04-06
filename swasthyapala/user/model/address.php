<?php

class UserAddress{

  //properties
  private $long,$lat;

  private $addressId;

  function __construct($long,$lat){
    $this->long=$long;
    $this->lat=$lat;
  }
  function set_address_id($addressId){
    $this->addressId=$addressId;
  }


  //getters
  function get_lat(){
    return $this->lat;
  }
  function get_long() {
    return $this->long;
  }
  function get_address_id(){
    return $this->addressId;
  }
  

  function insertUserAddress($address,$uid){
    include('../db_connect.php');
    
    $sql="INSERT INTO address (longitude,lattitude,uid)
          VALUES ($address->lat, $address->long,$uid)";

    if ($conn->query($sql) === TRUE) {
          $conn->close();
          return true;

      }else {

              $conn->close();
              return false;
      }
 
  }

}


?>