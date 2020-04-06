<?php

class Post{

//properties
private $post_content,$image_uri,$user_id;


function __construct(){
    
 }

 function createPost($post_content,$image_uri,$user_id){
   $newPost=new Post();
   $this->post_content=$post_content;
   $this->image_uri=$image_uri;
   $this->user_id=$user_id;
   return $newPost;
 }

 function set_post($post_content){
    $this->post_content=$post_content;
 }


 function set_image_uri($image_uri){
    $this->image_uri=$image_uri;
 }


 function set_user_id($user_id){
    $this->user_id=$user_id;
 }

 function get_post(){
    return $this->post_content;
 }


 function get_image_uri(){
   return  $this->image_uri;
 }


 function get_user_id(){
   return $this->user_id;
 }

 function insertPost($post){

   include('../db_connect.php');
   
   $insert_query= 
   "INSERT INTO post (content,imageUri,uid)
      VALUES('$post->post_content','$post->image_uri', $post->user_id)";

      if ($conn->query($insert_query) === TRUE) {
         $conn->close();
         return true;
      } else {
         $conn->close();
         echo "Error: " . $insert_query . "<br>" . $conn->error;
         return false;
      }

 }

 function updatePost($post){

   include('../db_connect.php');
   
   $update_Query="UPDATE post
      SET content = '$post->post_content',
          imageUri='$post->image_uri'
      WHERE uid =$post->user_id";
   
   if ($conn->query($update_Query) === TRUE) {
      $conn->close();      
      return true;
   } else {
       echo "Error: " . $update_Query . "<br>" . $conn->error;
       $conn->close();      
       return false;
      
      }
 }
 
}
?>