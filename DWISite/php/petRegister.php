<?php 
/*
Author - Joshua Watkins
Title - DWISite
Since - 11/04/2022
*/

include("DBConnect.php");
include("sanatiseInput.php");

#Store user information posted from register.php form
$petDetails = array($_POST['userID'], $_POST['name'], $_POST['answers'], $_POST['breed'], $_POST['weight']);

#Loop through details sanatising user input
$arrayLength = count($petDetails);
for($i = 0; $i < $arrayLength; $i++){
	$petDetails[$i] = sanatiseInput($petDetails[$i]);
}

#Prepared Statment - Entering data into ALBAuser
$RegisterPet = $DB->prepare("INSERT INTO DWIPet (userID, petName, petAnswersTo, breed, weight_KGs) VALUES (?, ?, ?, ?, ?)");
$RegisterPet->bind_param('sssss', $petDetails[0], $petDetails[1], $petDetails[2], $petDetails[3], $petDetails[4]);
$RegisterPet->execute();

#Check if registration successful and provide relevant feedback
if($RegisterPet){
	echo '<script type="text/javascript"> 
            window.location.replace("../currentPets.php");
        </script>';
} else {
	echo '<script type="text/javascript"> 
            window.location.replace("../registerPet.php");
            alert("Pet Registration Unsuccessful - Please Try Again!");
        </script>';
}		
?>