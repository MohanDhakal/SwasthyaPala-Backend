<?php

//allows access from all origin such as localhost,any domain or subdomain
header("Access-Control-Allow-Origin: *");


//what kind of methode we are accepting
header("Access-Control-Allow_Methods:GET");


include('../db_connect.php');

//provide options for which to select 
//1. Email Only(email)
//2.Username only(username)
//3. all the column from user table(this one is default)

$option="all";

if( isset( $_GET['user_filter'] ) ) { 
$option=$_GET['user_filter'] ;
} 


// $selectQuery;
    

switch($option){
    case "email":
        //offset is the starting column-1 i.e starting column is 1
        //until the length reaches 10 which is denoted by limit
        $selectQuery ="SELECT email FROM user LIMIT 10 OFFSET 0 ";
        $result = $conn->query($selectQuery);
        publishResults($result);

        
    break;
    case "name":
       $selectQuery ="SELECT userName FROM user LIMIT 10 OFFSET 0";
       $result = $conn->query($selectQuery);
       publishResults($result);

    break;

    default:
        //only returns user with addressId
        $selectQuery ="SELECT * FROM user WHERE addressId is NOT NULL LIMIT 10 OFFSET 0";
        $result = $conn->query($selectQuery);
        publishResults($result);
}


function publishResults($result){
    include('../db_connect.php');

    $user_list=array();

    while($row = $result->fetch_assoc()) {

        array_push(
            $user_list,array(
                "userId"=>$row["uid"],
                "userName"=>$row["userName"],
                "email"=>$row["email"],
                "phone"=>$row["phone"]
            ));
    }

        $conn->close();    
    
        http_response_code(200);

        echo json_encode(array(
            "status"=>1,
            "users"=>$user_list
        ));
      
}

?>