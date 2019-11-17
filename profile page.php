<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="p.css" type="text/css">
<title>My Profile</title>
<h2>My Profile Page</h2>
</head>

<body>

<?php
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

    if (is_dir('uploads/')){
        if ($dh = opendir('uploads/')){
          while (($file = readdir($dh)) !== false){
              if(strpos($file, $username) !== false)
                $target_file = 'uploads/'.$file;
          }
        }
    }
}
else {
    header('refresh:5; url=welcome_and_about.html');
}
?>

<form>
<table>
<img style="margin-left:5px;" src="<?php echo $target_file ?>" width="200" height="200" />
</table>
</form>
<fieldset>
<h2>My Profile</color></h2>
	&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<label><b>Name</b></label><div>
    <?php echo $name ?>
    </div>
    <br/>

    <br/>&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<label><b>Age</b></label><div>
    <?php echo $age ?>
    </div>
    <br/>

    <br/>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <label><b>Email</b></label><div>
    <?php echo $email ?>
    </div>
    <br/>
    
    <br/><label><b>Language currently Learning</b></label><div>
    <?php echo $curr_language ?>
    </div>
    <br/>

    <br/>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
    <label><b>Proficient Language</b></label><div>
    <?php echo $curr_language ?>
    </div>
    <br/>

    <button type="button" class="editbtn" onclick="window.location='edit_profile.php'">Edit</button><br/>

    <br/><button type="button" class="questions">Asked Questions</button><br/>

    <br/><button type="button" class="questions">Tagged Questions</button><br/>

   <br/> <button type="button" class="questions">Bookmarked Questions</button>



</fieldset>

</body>

   