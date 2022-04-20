<?php 
/*
Author - Joshua Watkins
Title - DWISite
Since - 25/02/2022
*/

include("DBConnect.php");
include("sanatiseInput.php");

#Store user information posted from updateUser.php form
$userDetails = array($_POST['userID'], $_POST['forename'], $_POST['surname'], $_POST['address1'], $_POST['address2'], $_POST['postcode'], $_POST['prefContact'], $_POST['phone'], $_POST['email'], $_POST['password'], $_POST['confirmPassword']);

#Loop through details sanatising user input
$arrayLength = count($userDetails);
for($i = 0; $i < $arrayLength; $i++){
	$userDetails[$i] = sanatiseInput($userDetails[$i]);
}

#Encrypt user password with PHP password hash
$hashedPassword = password_hash($userDetails[9], PASSWORD_DEFAULT);

#Prepared Statment - Entering data into ALBAuser
$UpdateUser = $DB->prepare("UPDATE DWIUser SET userForename = ?, userSurname = ?, addressLine1 = ?, addressLine2 = ?, postcode = ?, preferredContact = ?, phone = ?, email = ?, password = ? WHERE userID = ?");
$UpdateUser->bind_param('ssssssssss', $userDetails[1], $userDetails[2], $userDetails[3], $userDetails[4], $userDetails[5], $userDetails[6], $userDetails[7], $userDetails[8], $hashedPassword, $userDetails[0]);
$UpdateUser->execute();

#Check if registration successful and provide relevant feedback
if($UpdateUser){
	echo '<script type="text/javascript"> 
            window.location.replace("../index.php");
            alert("Update Successful!");
        </script>';
} else {
	echo '<script type="text/javascript"> 
            window.location.replace("../updateUser.php");
            alert("Update Unsuccessful - Please try again!");
        </script>';
}		
?>