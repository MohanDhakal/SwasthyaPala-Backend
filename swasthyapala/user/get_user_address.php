<?php

//allows access from all origin such as localhost,any domain or subdomain
header("Access-Control-Allow-Origin: *");


//what kind of methode we are accepting
header("Access-Control-Allow_Methods:GET");

include('../db_connect.php');


$lat_long_query=
"SELECT u.userName,a.lattitude,a.longitude,a.addressId,u.uid
    FROM user u 
    JOIN address a 
 ON u.addressId=a.addressId";


$result = $conn->query($lat_long_query);
$address_list=array();

while($row = $result->fetch_assoc()) {

    array_push(
        $address_list,array(
            "lattitude"=>$row["lattitude"],
            "longitude"=>$row["longitude"],
            "addressId"=>$row["addressId"],
            "userId"=>$row["uid"]
        ));

}

$conn->close();    
    
http_response_code(200);

echo json_encode(array(
    "status"=>1,
    "addresses"=>$address_list
));


?>