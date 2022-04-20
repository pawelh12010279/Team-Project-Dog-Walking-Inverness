<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 25/02/2022
*/
include("DBConnect.php");

$id = $_POST['bookingRef'];

#Get all available pets from DWIPet
$deleteBooking = "DELETE FROM DWIBookingDetails WHERE bookingRef = $id";
$deleteBooking = mysqli_query($DB, $deleteBooking); 
    
if($deleteBooking){
    echo '<script type="text/javascript"> 
            window.location.replace("../currentBookings.php");
        </script>';
} else {
    echo '<script type="text/javascript"> 
            window.location.replace("../index.php");
            alert("Booking could not be deleted at this time - Please Try Again!");
        </script>';
}           
?>

    
