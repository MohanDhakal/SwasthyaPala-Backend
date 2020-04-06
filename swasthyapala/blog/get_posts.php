<?php


//allows access from all origin such as localhost,any domain or subdomain
header("Access-Control-Allow-Origin: *");


//what kind of methode we are accepting
header("Access-Control-Allow_Methods:GET");
include('../blog/model/post.php');
include('../db_connect.php');

$select_Query;

if($_SERVER['REQUEST_METHOD']==="GET"){


    if(isset($_GET['postId'])){
        $postId=$_GET['postId'];
        $select_Query="SELECT * FROM post where postId=$postId";


    }else{
        
        $select_Query="SELECT * FROM post";

    }

    
    $result = $conn->query($select_Query);

    $post_list=array();

    while($row = $result->fetch_assoc()) {
       
        array_push($post_list,array(
            "content"=>$row["content"],
            "imageUri"=>$row["imageUri"],
            "uid"=>$row["uid"] ));
    }

    http_response_code(200);

    echo json_encode(array(
        "status"=>1,
        "posts"=>$post_list
    ));
    
}else{
    //service unavailable    
    http_response_code(503);
    echo json_encode( array(
        "status"=>0,
        "message"=>"Acess denied" ));   
}
?>