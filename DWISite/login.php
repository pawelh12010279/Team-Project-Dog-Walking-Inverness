<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 02/04/2022
*/
?>

<!DOCTYPE HTML>
<html>
	<head>
    	<title> DWI | Login </title>
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

		<div class="login-wrapper">
			<div class="content-title"> <h2> LOG IN </h2> </div>

			<div class="content-container">
				<form class="login-form" method="POST" action="php/loginUser.php">
					<label for="userEmail"> Email </label>
					<input type="email" name="userEmail">
					<label for="userPassword"> Password </label>
					<input type="password" name="userPassword">
					<a href="registerUser.php"> Don't have an account? <strong> Register here! </strong></a>
					<button type="Submit" name="Login"> Submit </button>
				</form>
			</div>
		</div>
	</div>

	<!-- Used to include the site Footer -->
	<?php include('footer.php'); ?>
</div> 
</body>
</html>





