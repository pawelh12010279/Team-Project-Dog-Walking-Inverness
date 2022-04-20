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
    	<title> DWI | Confirm Booking </title>
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
			<div class="content-title"> <h2> BOOKING CONFIRMED </h2> </div>

			<div class="content-container">
				<?php include('php/getUserBookings.php'); ?>
				<p></br>
					<em>*This is a confirmation for your booking, all relevant information can be found on this page! </em></br></br> Should you wish to cancel your booking 
					then this can be done in the account section of the website. If you have any questions please do not hesitate to contact us! </br></br> 
					We look forward to seeing you and your furry friend!</br></br> 
				</p>
				<button id="register-form-button" onclick="window.print();"> PRINT </button>
			</div>
		</div>
	</div>

	<!-- Used to include the site Footer -->
	<?php include('footer.php'); ?>
</div> 
</body>
</html>





