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
    	<title> DWI | Register </title>
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
			<div class="content-title"> <h2> REGISTER </h2> </div>

			<div class="content-container">
				<form method="POST" class="register-form" action="php/userRegister.php" >
					<div class="register-form-container">
						<label for="forename"> Forename </label>
						<input type="text" name="forename" maxlength="50" required>

						<label for="surname"> Surname </label>
						<input type="text" name="surname" maxlength="50" required>

						<label for="address1"> Address Line 1 </label>
						<input type="text" name="address1" maxlength="50" required>

						<label for="address2"> Address Line 2 </label>
						<input type="text" name="address2" maxlength="50" required>

						<label for="postcode"> Postcode </label>
						<input type="text" name="postcode" maxlength="8" pattern="^(([A-Z][0-9]{1,2})|(([A-Z][A-HJ-Y][0-9]{1,2})|(([A-Z][0-9][A-Z])|([A-Z][A-HJ-Y][0-9]?[A-Z])))) [0-9][A-Z]{2}$" title="Please enter a valid postcode!" required>
					</div>

					<div class="register-form-container">
						<label for="prefContact"> Preferred Method Of Contact </label>
						<input type="text" name="prefContact" list="prefContact" maxlength="5" placeholder="Choose from dropdown..." required>
							<datalist id="prefContact">
                            	<option value="Email">
                            	<option value="Phone">
                        	</datalist>

						<label for="phone"> Phone </label>
						<input type="text" name="phone" maxlength="11" required>

						<label for="email"> Email </label>
						<input type="email" name="email" maxlength="100" required>

						<label for="password"> Password </label>
						<input type="password" name="password" id="password" maxlength="15" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Password must contain Uppercase, Lowercase and Number!" required>

						<label for="confirmPassword"> Confirm Password </label>
						<input type="password" name="confirmPassword" id="confirmPassword" maxlength="15" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Password must contain Uppercase, Lowercase and Number!" required>
					</div>

					<button type="Submit" name="register" id="register-form-button"> Register </button>
				</form>
			</div>
		</div>
	</div>

	<!-- Used to include the site Footer -->
	<?php include('footer.php'); ?>
</div> 
</body>
</html>





