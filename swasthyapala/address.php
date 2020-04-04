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
  

}


?>