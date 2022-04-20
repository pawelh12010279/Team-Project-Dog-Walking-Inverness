<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 25/02/2022
*/
    
$user = $_SESSION['user']['userID'];

#Get all available pets from DWIPet
$getPet = "SELECT * FROM DWIPet WHERE userID = $user";
$getPet = mysqli_query($DB, $getPet);   
    
#Loop through all results and store in an array 
if(mysqli_num_rows($getPet) > 0){
    while($petArray = mysqli_fetch_assoc($getPet)){                          
?>
    <option value="<?php echo $petArray['petName']; ?>">
<?php
    }
} else {
?> 
    <option value="Please Register a Pet!">  
<?php
}             
?>

    
