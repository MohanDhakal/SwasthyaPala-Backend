<?php
//allows access from all origin such as localhost,any domain or subdomain
header("Access-Control-Allow-Origin: *");


//what kind of methode we are accepting
header("Access-Control-Allow_Methods:GET");


include('../blog/model/comment.php');
include('../db_connect.php');

if($_SERVER['REQUEST_METHOD']==="GET"){
   
    if(isset($_GET['postId'])){
        
        $postId=$_GET['postId'];
        $select_Query=
        "SELECT * FROM comments WHERE postId=$postId";

        $result = $conn->query($select_Query);
        $comments_list=array();

        while($row = $result->fetch_assoc()) {
            array_push(
                $comments_list,array(
                    "commentId"=>$row["commentId"],
                    "commentMsg"=>$row["commentMsg"],
                    "postId"=>$row["postId"]
                )
            );
        
        }
        $conn->close();    
    
        http_response_code(200);

        echo json_encode(array(
            "status"=>1,
            "comments"=>$comments_list
        ));
    
    }else{
        http_response_code(500);
        echo json_encode(array(
            "status"=>0,
            "comments"=>"pass required arguments"
        ));
      
    }
    
}else{
      //service unavailable    
      http_response_code(503);
      echo json_encode( array(
          "status"=>0,
          "message"=>"Acess denied" ));   
}



?>