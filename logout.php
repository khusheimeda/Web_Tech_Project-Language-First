<?php   
session_start();  
unset($_SESSION['Username']);  
session_destroy();  
header('refresh:1; url=welcome_and_about.html');  
?>  