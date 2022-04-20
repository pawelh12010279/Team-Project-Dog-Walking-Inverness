<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 25/02/2022
*/
    
$user = $_SESSION['user']['userID'];

#Get all available bookings from DWIBooking, allows for user input to create search functionalilty 
$getPet = "SELECT * FROM DWIPet WHERE userID = $user ORDER BY petName DESC";
$getPet = mysqli_query($DB, $getPet);   
    
#Loop through all results and store in an array 
if(mysqli_num_rows($getPet) > 0){
    while($petArray = mysqli_fetch_assoc($getPet)){                          
?>

    <div class="booking-container">
        <p> <?php echo $petArray['petID']; ?> </p>
        <p> <?php echo $petArray['petName']; ?> </p>
        <p> <?php echo $petArray['petAnswersTo']; ?> </p>
        <p> <?php echo $petArray['breed']; ?> </p>

        <form class="delete-booking" method="POST" action="php/deletePet.php">
            <input type="hidden" name="petID" value="<?php echo $petArray['petID']; ?>">
            <button class="card-button" type="Submit" name="delete"> Delete </button>
        </form>
    </div>

<?php
    }
}	             
?>
    
