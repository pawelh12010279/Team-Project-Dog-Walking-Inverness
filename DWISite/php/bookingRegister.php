<?php 
/*
Author - Joshua Watkins
Title - DWISite
Since - 15/04/2022
*/

include("DBConnect.php");
include("sanatiseInput.php");

#Store user information posted from register.php form
$bookingDetails = array($_POST['petName'], $_POST['userID'], $_POST['bookingID']);

#Loop through details sanatising user input
$arrayLength = count($bookingDetails);
for($i = 0; $i < $arrayLength; $i++){
	$bookingDetails[$i] = sanatiseInput($bookingDetails[$i]);
}

$getPetID = $DB->prepare("SELECT petID FROM DWIPet WHERE userID = ? AND petName = ?");
$getPetID ->bind_param('ss', $bookingDetails[1], $bookingDetails[0]);
$getPetID ->execute();
$resultPetID = $getPetID->get_result();
$petID = $resultPetID->fetch_assoc();
$petID = array_values($petID);

$date = date("Y/m/d");
$time = date("h:i:s");

#Prepared Statment - Entering data into DWIBookingDetails
$createBooking = $DB->prepare("INSERT INTO DWIBookingDetails (userID, petID, bookingID, bookingDate, bookingTime) VALUES (?, ?, ?, ?, ?)");
$createBooking->bind_param('sssss', $bookingDetails[1], $petID[0], $bookingDetails[2], $date, $time);
$createBooking->execute();

#Check if booking successful and provide relevant feedback
if($createBooking){
    $UpdateAvailability = "UPDATE DWIBooking SET availability = (availability - 1) WHERE bookingID = '$bookingDetails[2]'";
    $RunQuery = mysqli_query($DB, $UpdateAvailability);
	echo '<script type="text/javascript"> 
            window.location.replace("../confirmBooking.php");
        </script>';
} else {
	echo '<script type="text/javascript"> 
            window.location.replace("../book.php");
            alert("Booking Unsuccessful - Please Try Again!");
        </script>';
}	
?>