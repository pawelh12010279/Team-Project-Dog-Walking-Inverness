<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 10/04/2022
*/
?>

<!DOCTYPE HTML>
<html>
	<head>
    	<title> DWI | Book </title>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<link rel="icon" href="images/logo-notxt.svg" type="image/x-icon" sizes="16x16">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		<script src="js/myScripts.js" defer></script> 
    	<link type="text/css" rel="stylesheet" href="css/myStyleSheet.css" />
</head>

<body>  

<!-- Used to force footer to bottom of the page or content -->
<div id="page-container">
	<div id="content-container">

		<!-- Used to include the site Navigation -->
		<?php include('navigation.php'); ?>

		<!-- Banner image for website, Spacer used to cheat margins -->
		<div class="spacer"></div> 
		<div class="banner"></div>

		<div class="content-wrapper">
			<div class="content-title"> <h2> BOOKING DETAILS </h2> </div>

			<div class="content-container">
				<?php 
				$BookingID = $_POST['bookingID'];
	
				#Prepared Statment - Retrieving all data from DWIUser 
				$BookingInfo = $DB->prepare("SELECT * FROM DWIBooking WHERE bookingID = ?");
				$BookingInfo->bind_param('s', $BookingID);
				$BookingInfo->execute();
				$BookingInfoResult = $BookingInfo->get_result();
				$booking = $BookingInfoResult->fetch_assoc(); #Store results in $user array 
				?>

				<p> 
					Location: <?php echo $booking['location']; ?> </br>
					Date: <?php echo date("d/m/Y", strtotime($booking['date'])); ?> </br>
					Time: <?php echo date("H:i", strtotime($booking['time'])); ?> </br>		
				</p>

				<p></br>
					Name: <?php echo $_SESSION['user']['userForename']; ?> <?php echo $_SESSION['user']['userSurname']; ?> 
				</p>

				<form class="card-form" method="POST" action="php/bookingRegister.php">
					<label for="petName"> Pet Name: </label>
					<input type="text" name="petName" list="petName" maxlength="50" placeholder="Choose from dropdown..." required>
						<datalist id="petName">
                            <?php include('php/getPet.php'); ?>                          		
                        </datalist>
				
					<p></br>
						<strong> *For safety reasons, each owner may only bring one dog at any one time. </strong> </br></br>
						A Pet MUST be Registered before a booking can be made (This can be done in the account section)
					</p>

					<div class="spacer"></div> 
					<input type="hidden" name="userID" value="<?php echo $_SESSION['user']['userID']; ?>">
					<input type="hidden" name="bookingID" value="<?php echo $booking['bookingID']; ?>">

					<div class="book-button-contain">
						<button type="Submit" name="book" id="booking-form-button"> Confirm Booking </button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Used to include the site Footer -->
	<?php include('footer.php'); ?>
</div> 
</body>
</html>





