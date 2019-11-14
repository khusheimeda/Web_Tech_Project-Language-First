<!DOCTYPE HTML>
<html>
<head>
<title>Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>

<?php

define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', 'root123');
define('DB_DATABASE', 'lang_first_db'); 
$con = mysqli_connect(DB_SERVER,'root','',DB_DATABASE);

if(!$con)
  echo "Failed to connect";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$name = mysqli_real_escape_string($con, $_POST['name']);
$age = mysqli_real_escape_string($con, $_POST['age']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$pro_language = mysqli_real_escape_string($con, $_POST['pro_language']);
$curr_language = mysqli_real_escape_string($con, $_POST['curr_language']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$psw = mysqli_real_escape_string($con, $_POST['psw']);
$encryptPassword = password_hash($psw, PASSWORD_DEFAULT);
}

$stmt = $con->prepare("INSERT INTO PROFILE(Name, Age, Email, Proficient Language, Current Language, Username, Password) VALUES(?, ?, ?, ?, ?, ?, ?)"); //Fetching all the records with input credentials
$stmt->bind_param("sisssss", $name, $age, $email, $pro_language, $curr_language, $username, $encryptPassword); //Where s indicates string type. You can use i-integer, d-double
$stmt->execute();
$result = $stmt->affected_rows;
$stmt -> close();
$db -> close(); 

if($result > 0)
{
header("location: RegSuccess.php"); // user will be taken to the success page
}
else
{
echo "Oops. Something went wrong. Please try again";}

?>

<div class="container">
<form method="POST" action="register1.php">
<h1 align="center"> Sign Up</h1> 
<table id="table1"; cellspacing="5px" cellpadding="5%"; align="center">  
    <tr>  
    <td  align="right"><label for="name"><b>Name</b></label></td>  <td><input type="text" placeholder="Full name" name="fname" maxlength="25" required></td>
    <td  align="right"><label for="age"><b>Age</b></label></td>    <td><input type="text" placeholder="Enter Age" name="age" required></td>
    </tr>

    <tr>
    <td  align="right"><label for="email"><b>Email</b></label></td>  <td><input type="text" placeholder="Enter Email" name="email" maxlength="50" required></td>
    <td  align="right"><label for="language"><b>Language proficient in</b></label>   <td><select multiple name="pro_language">
  <option value="English" selected>English</option>
  <option value="German">German</option>
  <option value="French">French</option>
  <option value="Spanish">Spanish</option>
  </select></td>
    </tr>

    <tr>
    <td  align="right"><label for="language"><b>Language learning</b></label></td>   <td><select multiple name="curr_language">
        <option value="German">German</option>
        <option value="French">French</option>
        <option value="Spanish">Spanish</option>
      </select></td> 
    <td  align="right"><label for="Username"><b>Username</b></label></td>   <td><input type="text" placeholder="Enter Username" name="username" maxlength="20" required></td>
    </tr>

    <tr>
    <td  align="right"><label for="psw"><b>Password</b></label></td>    <td><input type="password" placeholder="Enter Password" name="psw" maxlength="20" required></td>
    <td  align="right"><label for="psw-repeat"><b>Confirm Password</b></label></td> <td><input type="password" placeholder="Confirm Password" name="psw-repeat" maxlength="20" required></td>
</tr>
</table>

<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

<button type="submit" class="registerbtn">Register</button>

</form>
<!--<script type="text/javascript" src="validate.js"></script>-->
<div class="container signin">
<p>Already have an account? <a href="#">Sign in</a></p>
</div>

</div>
</body>

        