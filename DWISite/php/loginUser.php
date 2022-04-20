<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 10/04/2022
*/

include('DBConnect.php');
include('sanatiseInput.php'); #Include Input Sanatiser

session_start(); # Start the session

if(isset($_POST['Login'])){
	#Store information posted through Log In Form
	$userDetails = array($_POST['userEmail'], $_POST['userPassword']); 

	#Loop through details sanatising user input
	$arrayLength = count($userDetails);
	for($i = 0; $i < $arrayLength; $i++){
		$userDetails[$i] = sanatiseInput($userDetails[$i]);
	}
	
	#Prepared Statment - Retrieving all data from DWIUser 
	$VerifyUser = $DB->prepare("SELECT * FROM DWIUser WHERE email = ?");
	$VerifyUser->bind_param('s', $userDetails[0]);
	$VerifyUser->execute();
	$VerifyUserResult = $VerifyUser->get_result();
	$user = $VerifyUserResult->fetch_assoc(); #Store results in $user array

	#Verify hashed password agaisnt value stored in $user array
	if(password_verify($userDetails[1], $user['password'])){
		#Create a session and insert $user array - Redirect to index.php
		$_SESSION['user'] = $user;
		header("Location:../index.php");
	} else {
		#if Unsuccessful - Alert username or password incorrect!
		echo    
			'<script type="text/javascript"> 
				window.location.replace("../login.php");
				alert("Sign In Unsuccessful - Username OR Password Incorrect!");
			</script>';
	}
}
?>