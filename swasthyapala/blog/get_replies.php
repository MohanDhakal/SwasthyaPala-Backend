<?php

//allows access from all origin such as localhost,any domain or subdomain
header("Access-Control-Allow-Origin: *");


//what kind of methode we are accepting
header("Access-Control-Allow_Methods:GET");


include('../blog/model/reply.php');
include('../db_connect.php');

if($_SERVER['REQUEST_METHOD']==="GET"){

    if(isset($_GET['commentId'])){
        
        $commentId=$_GET['commentId'];

        $select_Query=
        "SELECT * FROM replies WHERE commentId=$commentId";
        
        $reply_list=array();

        $result = $conn->query($select_Query);
        
        while($row = $result->fetch_assoc()) {
            array_push(
                $reply_list,array(
                    "replyId"=>$row["repId"],
                    "repMsg"=>$row["repMsg"],
                    "commentId"=>$row["commentId"],
                    "mRepId"=>$row["mRepId"]
                )
            );
      
        }
        $conn->close();    
    
        http_response_code(200);

        echo json_encode(array(
            "status"=>1,
            "replies"=>$reply_list
        ));
    
    }else{
        http_response_code(500);
        echo json_encode(array(
            "status"=>0,
            "comments"=>"pass the required argument"
        ));
      
    }
}


?>