<?php
/*
Author - Joshua Watkins
Title - DWISite
Since - 25/02/2022
*/

/*  Function trims blank spaces from the start and end of input
    removes slashes from within the text and changes "" to a suitable input */
function sanatiseInput($Input){
    $Input = trim($Input);
    $Input = stripslashes($Input);
    $Input = htmlspecialchars($Input, ENT_QUOTES);
    return $Input;
} 
?>