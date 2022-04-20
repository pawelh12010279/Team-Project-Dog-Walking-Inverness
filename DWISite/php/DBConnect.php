<?php
/*
Author - Joshua Watkins
Title - ALBA Cruises
Since - 07/12/2021
*/

#Connection to the Database!
DEFINE ('DB_USER', 'IN19004936');				#Username
DEFINE ('DB_PASSWORD','IN19004936');			#Password
DEFINE ('DB_HOST', 'comp-server.uhi.ac.uk');	#Host Address
DEFINE ('DB_NAME', 'IN19004936');				#Database Name*/
@$DB = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
	
#If Error display error message!
if (mysqli_connect_errno()){
	echo 'Cannot connect to the database: ' . mysqli_connect_error();
}		
?>