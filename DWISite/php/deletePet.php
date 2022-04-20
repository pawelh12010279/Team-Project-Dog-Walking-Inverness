<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 25/02/2022
*/

include("DBConnect.php");
    
$id = $_POST['petID'];

#Get all available pets from DWIPet
$deletePet = "DELETE FROM DWIPet WHERE petID = $id";
$deletePet = mysqli_query($DB, $deletePet); 
    
if($deletePet){
    echo '<script type="text/javascript"> 
            window.location.replace("../currentPets.php");
            alert("Pet Info Successfully Deleted");
        </script>';
} else {
    echo '<script type="text/javascript"> 
            window.location.replace("../currentPets.php");
            alert("Pet Info could not be deleted at this time - Please Try Again!");
        </script>';
}           
?>

    
