<html>
<head>
<link rel="stylesheet" href="p.css" type="text/css">
<form>
<title>My Profile</title>
<h2>My Profile Page</h2>

</head>
<body>

<?php
//require_once('login1.php');
session_start();
$db = mysqli_connect('localhost', 'root', '', 'lang_first_db');
if (isset($_SESSION['Username'])) {
    $username=$_SESSION['Username'];
    $user_check_query = "SELECT * FROM lang_first_tb WHERE Username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $row = mysqli_fetch_assoc($result);
    $name = $row['FullName'];
    $age=$row['Age'];
    $email = $row['Email'];
    $pro_language = $row['Proficient_Language'];
    $curr_language = $row['Current_Language'];
}
else {
    header('refresh:5; url=welcome_and_about.html');
}
?>


<table>
<img style="margin-left:5px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQfbAGxAhFwWC1FqBA4OEuNVttlb4y8xvN1Lf2uq07HVD9sc1f9" width="200" height="200" />
</table>
</form>
<fieldset>
<h2>My Profile</color></h2>
	&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<label for="name"><b>Name</b></label><?php echo $name ?>
    <br/>

    <br/>&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<label for="age"><b>Age</b></label><?php echo $age ?>
    <br/>

    <br/>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <label for="email"><b>Email</b></label><?php echo $email ?>
    <br/>
    
    <br/><label for="language"><b>Language currently Learning</b></label><?php echo $curr_language ?>
    <br/>

    <br/>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
    <label for="language"><b>Proficient Language</b></label><?php echo $curr_language ?>
    <br/>

    <button type="button" class="editbtn">Edit</button><br/>

    <br/><button type="button" class="questions">Asked Questions</button><br/>

    <br/><button type="button" class="questions">Tagged Questions</button><br/>

   <br/> <button type="button" class="questions">Bookmarked Questions</button>



</fieldset>

</body>

   