<?php
include('db_connect.php');

$lat_long_query=
"SELECT u.userName,a.lattitude,a.longitude 
FROM user u 
JOIN address a 
ON u.addressId=a.addressId";

$result = $conn->query($lat_long_query);

while($row = $result->fetch_assoc()) {
    echo (json_encode($row));
}      

?>