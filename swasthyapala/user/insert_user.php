<?php
//allows access from all origin such as localhost,any domain or subdomain
header("Access-Control-Allow-Origin: *");

//type of data we are getting inside the request
header("Content-type:application/json; charset=UTF-8");


//what kind of methode we are accepting
header("Access-Control-Allow_Methods:POST");


include('../db_connect.php');
include('../user/model/user.php');


if($_SERVER['REQUEST_METHOD']==="POST"){
    $data=json_decode(
        file_get_contents("php://input")
    );
    
    $newUser= User::createNewUser($data->userName,$data->password
    ,$data->phone,$data->email);
    
    if( $newUser->insertUser($newUser)){
        //result okay
        http_response_code(200);
        echo json_encode(
            array(
                "status"=>1,
                "message"=>"new user has been added"
            ));

    } else{
        //internal server error
        http_response_code(500);
        echo json_encode(
            array(
                "status"=>0,
                "message"=>"failed to add new user" ));
    }

}else{

    //service unavailable
    http_response_code(503);
    
    echo json_encode(
        array(
            "status"=>0,
            "message"=>"Acess denied" ));
}

?>