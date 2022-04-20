<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 25/02/2022
*/

$user = $_SESSION['user']['userID'];

$getBooking = "SELECT * FROM DWIBookingDetails WHERE userID = $user ORDER BY bookingDate DESC, bookingTime DESC LIMIT 1";
$getBooking = mysqli_query($DB, $getBooking);

if(mysqli_num_rows($getBooking) > 0){
    while($bookingArray = mysqli_fetch_assoc($getBooking)){
        $pet = $bookingArray['petID'];
        $booking = $bookingArray['bookingID'];
    }
}

#Get all available bookings from DWIBooking, allows for user input to create search functionalilty 
$getBookingInfo = "SELECT * FROM DWIUser u, DWIPet p , DWIBooking b, DWIBookingDetails d WHERE d.userID = u.userID AND d.petID = p.petID AND d.bookingID = b.bookingID AND d.userID = $user AND d.petID = $pet AND d.bookingID = $booking  ORDER BY d.bookingDate DESC, d.bookingTime DESC LIMIT 1";
$getBookingInfo = mysqli_query($DB, $getBookingInfo);   
    
#Loop through all results and store in an array 
if(mysqli_num_rows($getBookingInfo) > 0){
    while($petArray = mysqli_fetch_assoc($getBookingInfo)){                          
?>
        <p> 
			Location: <?php echo $petArray['location']; ?> </br>
			Date: <?php echo date("d/m/Y", strtotime($petArray['date'])); ?> </br>
			Time: <?php echo date("H:i", strtotime($petArray['time'])); ?> </br></br>
            Name: <?php echo $petArray['userForename'] ?> <?php echo $petArray['userSurname']; ?> </br>
            Pet Name: <?php echo $petArray['petName']; ?> </br>
		</p>
<?php
    }
}	
?>
    
