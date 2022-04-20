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
    	<title> DWI | Register Pet </title>
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
			<div class="content-title"> <h2> REGISTER PET </h2> </div>

			<div class="content-container">
				<form method="POST" class="register-form" action="php/petRegister.php" >
					<div class="register-form-container">
						<input type="hidden" name="userID" value="<?php echo $_SESSION['user']['userID'] ?>" required>
						<label for="name"> Name </label>
						<input type="text" name="name" maxlength="50" required>

						<label for="answers"> Answers To </label>
						<input type="text" name="answers" maxlength="50" required>
					</div>

					<div class="register-form-container">		
						<label for="breed"> Breed </label>
						<input type="text" name="breed" maxlength="50" required>

						<label for="weight"> Weight (KGs) </label>
						<input type="text" name="weight" maxlength="100" required>
					</div>

					<button type="Submit" name="register" id="register-form-button"> Register </button>
				</form>

				<p id="petNotice"> 
					<strong> *Please note other pets may be added via the account page </br></br> </strong>
					<em> All dogs brought along to the walks must be dog/people friendly, any sign of aggression or misbehaviour may result in a ban from our services! </em> 
				</p>
			</div>
		</div>
	</div>

	<!-- Used to include the site Footer -->
	<?php include('footer.php'); ?>
</div> 
</body>
</html>






