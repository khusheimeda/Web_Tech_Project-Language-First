<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="register.css">

<?php
// define variables and set to empty values
$name = $email = $username = $age = $password = $cnfpassword= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $username = test_input($_POST["username"]);
  $age = test_input($_POST["age"]);
  $password = test_input($_POST["password"]);
  $cnfpassword = test_input($_POST["cnfpassword"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="POST" action="registration_validate.php">
  <div class="container">

    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    &emsp;&nbsp;&nbsp;<label for="name"><b>Name</b></label>
    <input type="text" placeholder="First name" name="fname" maxlength="25" required>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

   
    <label for="age"><b>Age</b></label>
    <input type="text" placeholder="Enter Age" name="age" required><br />

    &emsp;&nbsp;&nbsp;<label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" maxlength="50" required>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

    <label for="language"><b>Language proficient in</b></label>
    <select multiple>
      <option value="English" selected>English</option>
      <option value="German">German</option>
      <option value="French">French</option>
      <option value="Spanish">Spanish</option>
    </select>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;

    <label for="language"><b>Language learning</b></label>
    <select multiple>
      <option value="German">German</option>
      <option value="French">French</option>
      <option value="Spanish">Spanish</option>
    </select>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;

    <label for="Username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" maxlength="20" required><br />

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" maxlength="20" required>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="psw-repeat" maxlength="20" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>

</body>
</html>