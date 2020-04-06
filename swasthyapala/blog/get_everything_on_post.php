
<?php
//allows access from all origin such as localhost,any domain or subdomain
header("Access-Control-Allow-Origin: *");


//what kind of methode we are accepting
header("Access-Control-Allow_Methods:GET");

include('../db_connect.php');

// get every comments and replies of the particular post

//first of all let's join the table in the database and
//get all the comments and replies of the post
if($_SERVER['REQUEST_METHOD']==="GET"){
   
  if(isset($_GET['postId'])){
      
      $postId=$_GET['postId'];
     
     $select_Query="SELECT 
       p.content,p.postId,c.commentMsg,r.repMsg,r.repId,c.commentId
       FROM post p
       JOIN comments c 
       ON p.postId=c.postId
       JOIN replies r
       ON c.commentId=r.commentId
       WHERE p.postId= $postId ";
     
          
      $result = $conn->query($select_Query);
      $post_list=array();

      while($row = $result->fetch_assoc()) {
          array_push(
              $post_list,array(
                  "postId"=>$row["postId"],
                  "commentId"=>$row["commentId"],
                  "repId"=>$row["repId"],
                  "content"=>$row["content"],
                  "commentMsg"=>$row["commentMsg"],
                  "repMsg"=>$row["repMsg"],
              )
          );
      
      }
      $conn->close();    
  
      http_response_code(200);

      echo json_encode(array(
          "status"=>1,
          "posts"=>$post_list
      ));
  
  }else{
      http_response_code(500);
      echo json_encode(array(
          "status"=>0,
          "message"=>"pass required arguments"
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