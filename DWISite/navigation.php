<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 25/02/2022
*/
include("php/loginUser.php")
?>

<?php
    if(isset($_SESSION['user'])){
?>
<nav>
    <div class="navWrapper">
        <!-- Holds the display for mobile devices -->
        <div class="collapsedUI">
            <a href="index.php"> <img id="collapsedUILogo" src="images/logo.svg" alt="Local Theatr Logo" Height="45" /> </a>
            <button class="hamburger"><i class="fa fa-bars" style="font-size:20px; color:white"></i></button>
        </div>

        <!-- Navigation display changes based on user -->
        <a href="index.php"> <img id="brandLogo" src="images/logo.svg" alt="Local Theatr Logo" Height="60" /> </a>
	    <div class="navContent">
		    <ul>
		    	<li> <a href="index.php"> HOME </a> </li>
			    <li> <a href="about.php"> ABOUT </a> </li>
		    	<li> <a href="contact.php"> CONTACT </a> </li>
                <li> <a href="blog.php"> BLOG </a> </li>
                <li> <a href="#">       </a> </li>
		    </ul>
            <ul>
                <li> <a href="#">       </a> </li>
                <div class="dropdown">
                    <li> <a href="#"> <?php echo strtoupper($_SESSION['user']['userForename']); ?> <i class='fas fa-caret-down' style='font-size:12px'></i> </a> </li>
                    <div class="dropdown-content">
                                    <div class="userLinks"> 
                                        <li> <a href="currentPets.php"> CURRENT PETS </a> </li>
                                        <li> <a href="registerPet.php"> REGISTER PET </a> </li>
                                        <li> <a href="currentBookings.php"> CURRENT BOOKINGS </a> </li>
			                            <li> <a href="updateUser.php"> ACCOUNT SETTINGS </a> </li>
                                    </div>
								</div>
                    </div>
                <li> <a href="php/logoutUser.php"> LOG OUT </a> </li>
            </ul>	        
    </div>
</nav>

<?php
    } else {
?>

<nav>
    <div class="navWrapper">
        <!-- Holds the display for mobile devices -->
        <div class="collapsedUI">
            <a href="index.php"> <img id="collapsedUILogo" src="images/logo.svg" alt="Local Theatr Logo" Height="45" /> </a>
            <button class="hamburger"><i class="fa fa-bars" style="font-size:20px; color:white"></i></button>
        </div>

        <!-- Navigation display changes based on user -->
        <a href="index.php"> <img id="brandLogo" src="images/logo.svg" alt="Local Theatr Logo" Height="60" /> </a>
	    <div class="navContent">
		    <ul>
		    	<li> <a href="index.php"> HOME </a> </li>
			    <li> <a href="about.php"> ABOUT </a> </li>
		    	<li> <a href="contact.php"> CONTACT </a> </li>
                <li> <a href="#"> BLOG </a> </li>
                <li> <a href="#">       </a> </li>
		    </ul>
            <ul>
                <li> <a href="#">       </a> </li>
                <li> <a href="registerUser.php"> REGISTER </a> </li>
                <li> <a href="login.php"> LOGIN </a> </li>
            </ul>	        
    </div>
</nav>

<?php
    }
?>

<script type="text/javascript">
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('a');
    const menuLength = menuItem.length

    for(let i = 0; i<menuLength; i++){
	    if(menuItem[i].href === currentLocation){
		    menuItem[i].className = "active"
	    }
    }
</script> 