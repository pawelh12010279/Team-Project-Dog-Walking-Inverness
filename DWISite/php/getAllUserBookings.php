<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 25/02/2022
*/

$user = $_SESSION['user']['userID'];

#Get all available bookings from DWIBooking, allows for user input to create search functionalilty 
$getBookingInfo = "SELECT * FROM DWIUser u, DWIPet p , DWIBooking b, DWIBookingDetails d WHERE d.userID = u.userID AND d.petID = p.petID AND d.bookingID = b.bookingID AND d.userID = $user AND b.date > CURRENT_DATE() ORDER BY d.bookingDate DESC";
$getBookingInfo = mysqli_query($DB, $getBookingInfo);   
    
#Loop through all results and store in an array 
if(mysqli_num_rows($getBookingInfo) > 0){
    while($petArray = mysqli_fetch_assoc($getBookingInfo)){                          
?>

        <div class="booking-container">
            <p> <?php echo date("d/m/Y", strtotime($petArray['date'])); ?> - <?php echo date("H:i", strtotime($petArray['time'])); ?> </p>
            <p> <?php echo $petArray['userForename'] ?> <?php echo $petArray['userSurname']; ?> </p>
            <p> <?php echo $petArray['petName']; ?> </p>
            <p> <?php echo $petArray['location']; ?> </p>

            <form class="delete-booking" method="POST" action="php/deleteBooking.php">
                <input type="hidden" name="bookingRef" value="<?php echo $petArray['bookingRef']; ?>">
                <button class="card-button" type="Submit" name="delete"> Delete </button>
            </form>
        </div>
<?php
    }
}	             
?>
    
