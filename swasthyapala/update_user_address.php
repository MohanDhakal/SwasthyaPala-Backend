
<?php
//this file will update addressid in user table
//once address is added in the address table

include('db_connect.php');
include('user.php');

$updatedUser=User::updateExistingUserWithAddressId();

//the userid should be provided from api
$userId=$_GET['uid'];

//select the address of given userid from addres
//table
$addrSql="SELECT addressId FROM `address` WHERE uid=$userId";

$result = $conn->query($addrSql);



$addressIdofGivenUser;
if ($result->num_rows > 0) {
        // output data of each row
 $addressIdofGivenUser= ($result->fetch_assoc())["addressId"];

} else {
    echo "No  results";
}



$updatedUser->set_adress_id($addressIdofGivenUser);


//now update the user table
// with the given addressid 
//to the particular user
$updatedAddress=$updatedUser->get_address_id();
echo $updatedAddress;

//now write an update query for the user table
$updateQuery=
"UPDATE user
SET addressId = $updatedAddress
WHERE uid = $userId";


if ($conn->query($updateQuery) === TRUE) {
    echo " Record updated successfully";
} else {
    echo "Error: " . $updateQuery . "<br>" . $conn->error;
}

$conn->close();

?>