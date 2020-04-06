<?php

class Replies{

    //properties;

    private $reply_msg,$m_rep_id,$comment_id;

    function __construct(){
    }

    static function createNestedReplyInstant($reply_msg,$m_rep_id,$comment_id){
        $new_reply=new Replies();
        $new_reply->reply_msg=$reply_msg;
        $new_reply->m_rep_id=$m_rep_id;
        $new_reply->comment_id=$comment_id;
        return $new_reply;

    }
    static function createReplyInstant($reply_msg,$comment_id){
        $new_reply=new Replies();
        $new_reply->reply_msg=$reply_msg;
        $new_reply->comment_id=$comment_id;
        return $new_reply;
    }
    
    function set_comment_id($comment_id){
        $this->comment_id=$comment_id;
    }
    
    function set_rep_msg($reply_msg){
        $this->reply_msg=$reply_msg;
    }

    function set_rep_id($m_rep_id){
        $this->m_rep_id=$m_rep_id;
    }

    //getters
    function get_rep_msg(){
        return $this->reply_msg;
    }

    function get_m_rep_id(){
         return  $this->m_rep_id;
    }
    function get_comment_id(){
        return  $this->comment_id;
   }
   function insertReply($reply){
        include('../db_connect.php');

        $insert_query;

        if(isset($reply->m_rep_id)){
        
            $insert_query= "INSERT INTO replies (repMsg,commentId,mRepId)
            VALUES('$reply->reply_msg',$reply->comment_id,$reply->m_rep_id)"; 

        }else{
            $insert_query=  "INSERT INTO replies (repMsg,commentId)
            VALUES('$reply->reply_msg',$reply->comment_id)"; 
        }
        

        if ($conn->query($insert_query) === TRUE) {

            $conn->close();
            return true;

        } else {
    
            echo "Error: " . $insert_query . "<br>" . $conn->error;
            return false;
    
        }
    

   }
}

?>