<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 10/04/2022
*/ 

#Takes the users input from search and stores it in $Search 
#Default '' to allow for all results to be returned
if(isset($_POST['search-submit'])){
    $Search = sanatiseInput($_POST['search']);
} else {
    $Search = ''; 
}
    
#Get all available bookings from DWIBooking, allows for user input to create search functionalilty 
$getCards = "SELECT * FROM DWIBooking WHERE date > CURRENT_DATE() AND location LIKE '%$Search%' OR date LIKE '%$Search%' ORDER BY date ASC LIMIT 10";
$getCards = mysqli_query($DB, $getCards);   
    
#Loop through all results and store in an array 
if(mysqli_num_rows($getCards) > 0){
    while($cardArray = mysqli_fetch_assoc($getCards)){ 
        if($cardArray['availability'] > 0){                         
?>
        <div class="card">
            <div class="card-title"> 
                <p> <?php echo $cardArray['location'] ?> </p> 
                <p> <?php echo date("d/m/Y", strtotime($cardArray['date']));?> - <?php echo date("H:i", strtotime($cardArray['time'])); ?> </p> 
            </div>

            <div class="card-image">
                <img src="<?php echo $cardArray['imgSource'] ?>" alt="Park Image" style="width: 100%; object-fit: contain">
            </div>

            <div class="card-availability">
                <img src="images/avaiable-icon.svg" alt="Availability Icon">
                <p> <?php echo $cardArray['availability']; ?></p>
            </div>

            <div class="card-button-container">
                <?php
                    if(isset($_SESSION['user'])){
                ?>
                    <form method="POST" class="card-form" action="book.php" >
                        <input type="hidden" name="bookingID" maxlength="50" value="<?php echo $cardArray['bookingID'] ?>" required>
                        <button class="card-button" type="submit"> BOOK NOW <button>
                    </form>
                <?php
                    } else {
                ?>
                    <!-- Guest Link -->
                    <a class="card-link" href="login.php"><button class="card-button"> BOOK NOW </button></a>
                <?php
                    }
                ?>
            </div>
        </div>

<?php
}
    }	
        }            
?>
    
