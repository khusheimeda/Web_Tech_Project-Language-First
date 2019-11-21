<!DOCTYPE HTML>
<html>
<head>
<title>Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>

<?php

session_start();

// initializing variables
$username="";
$age=0;
$email="";
$name="";
$psw="";
$pro_language="";
$curr_language="";
$cnfpsw="";
$errors = array(); 

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'lang_first_db');

// REGISTER USER
if (isset($_POST['registerbtn'])) {
// receive all input values from the form
$name = mysqli_real_escape_string($db, $_POST['name']);
$age = mysqli_real_escape_string($con, $_POST['age']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$pro_language = mysqli_real_escape_string($con, $_POST['pro_language']);
$curr_language = mysqli_real_escape_string($con, $_POST['curr_language']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$psw = mysqli_real_escape_string($con, $_POST['psw']);
$cnfpsw = mysqli_real_escape_string($con, $_POST['psw-repeat']);

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($name)) { array_push($errors, "Name is required");}
if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($email)) { array_push($errors, "Email is required"); }
if (empty($psw)) { array_push($errors, "Password is required"); }
if ($psw != $cnfpsw) {
array_push($errors, "The two passwords do not match");
}

// first check the database to make sure 
// a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
  if ($user['username'] === $username) {
    array_push($errors, "Username already exists");
  }

  if ($user['email'] === $email) {
    array_push($errors, "email already exists");
  }
}

// Finally, register user if there are no errors in the form
if (count($errors) == 0) {
  $password = md5($psw);//encrypt the password before saving in the database

  $query = "INSERT INTO lang_first_tb(FullName, Age, Email, Proficient_Language, Current_Language, Username, Enc_Password) VALUES($name, $age, $email, $pro_language, $curr_language, $username, $password)";
  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "You are now logged in";
  $message = "success";
echo "<script type='text/javascript'>alert('$message');</script>";
  header('location: main.php');
}
}

?>

<div class="container">
<form method="POST" action="register1.php">
<h1 align="center"> Sign Up</h1> 
<table id="table1"; cellspacing="5px" cellpadding="5%"; align="center">  
    <tr>  
    <td  align="right"><label for="name"><b>Name</b></label></td>  <td><input type="text" placeholder="Full name" name="fname" maxlength="25" value="<?php echo $name; ?>" required></td>
    <td  align="right"><label for="age"><b>Age</b></label></td>    <td><input type="text" placeholder="Enter Age" name="age" value="<?php echo $age; ?>" required></td>
    </tr>

    <tr>
    <td  align="right"><label for="email"><b>Email</b></label></td>  <td><input type="text" placeholder="Enter Email" name="email" value="<?php echo $email; ?>" maxlength="50" required></td>
    <td  align="right"><label for="language"><b>Language proficient in</b></label>   <td><select multiple name="pro_language">
  <option <?php if($pro_language=="English"){echo "selected";}?> selected>English</option>
  <option <?php if($pro_language=="German"){echo "selected";}?>>German</option>
  <option <?php if($pro_language=="French"){echo "selected";}?>>French</option>
  <option <?php if($pro_language=="Spanish"){echo "selected";}?>>Spanish</option>
  </select></td>
    </tr>

    <tr>
    <td  align="right"><label for="language"><b>Language learning</b></label></td>   <td><select multiple name="curr_language">
        <option <?php if($curr_language=="German"){echo "selected";}?>>German</option>
        <option <?php if($curr_language=="French"){echo "selected";}?>>French</option>
        <option <?php if($curr_language=="Spanish"){echo "selected";}?>>Spanish</option>
      </select></td> 
    <td  align="right"><label for="Username"><b>Username</b></label></td>   <td><input type="text" placeholder="Enter Username" name="username" maxlength="20" value="<?php echo $username; ?>" required></td>
    </tr>

    <tr>
    <td  align="right"><label for="psw"><b>Password</b></label></td>    <td><input type="password" placeholder="Enter Password" name="psw" maxlength="20" value="<?php echo $psw; ?>" required></td>
    <td  align="right"><label for="psw-repeat"><b>Confirm Password</b></label></td> <td><input type="password" placeholder="Confirm Password" name="psw-repeat" maxlength="20" value="<?php echo $cnfpsw; ?>" required></td>
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
</html>