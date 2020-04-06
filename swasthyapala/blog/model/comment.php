<?php

class Comments{

    private $comment_message;
    private $post_id;

    //constructor
    function __construct($comment_message,$post_id){
        $this->comment_message=$comment_message;
        $this->post_id=$post_id;
    }

    //setters
    function set_msg($comment_message){

        $this->comment_message=$comment_message;
    
    }


    function set_post_id($post_id){
        $this->post_id=$post_id;
    }


    //getters
    function get_msg(){
        return $this->comment_message;
    }

    function get_post_id(){
        return $this->post_id;
    }

    function insertComment($comment){
        include('../db_connect.php');
        $cmt_insert_Query=
        "INSERT INTO comments (commentMsg,postId)
        VALUES('$comment->comment_message',$comment->post_id)";
        
        
        if ($conn->query($cmt_insert_Query) === TRUE) {
            $conn->close();
            return true;

        } else {
            echo "Error: " . $cmt_insert_Query . "<br>" . $conn->error;
            return false;
        }
        
    

    }

}
?>