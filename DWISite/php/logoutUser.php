<?php 
/*
Author - Joshua Watkins
Title - DWISite
Since - 25/02/2022
*/

session_start();

#Destroy session then redirect user to index.php!
if(session_destroy()){
	header("Location:../index.php");
}
?>