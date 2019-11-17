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
}
else {
    header('refresh:5; url=welcome_and_about.html');
}
?>

<form method="POST" action="upload_and_edit.php" enctype="multipart/form-data">>

<!--<img style="margin-left:5px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQfbAGxAhFwWC1FqBA4OEuNVttlb4y8xvN1Lf2uq07HVD9sc1f9" width="200" height="200" />-->
Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">

<fieldset>
<h2>My Profile</color></h2>
	&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<label><b>Name</b></label><textarea name="fname" required><?php echo $name ?>
    </textarea>
    <br/>

    <br/>&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<label><b>Age</b></label><textarea name="age" required>
    <?php echo $age ?>
    </textarea>
    <br/>

    <br/>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <label><b>Email</b></label><textarea name="email" required>
    <?php echo $email ?>
    </textarea>
    <br/>
    
    <br/><label><b>Language currently Learning</b></label><select multiple name="curr_language[]" required>
        <option value="German">German</option>
        <option value="French">French</option>
        <option value="Spanish">Spanish</option>
      </select>
    <br/>

    <br/>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
    <label><b>Proficient Language</b></label><select multiple name="pro_language[]" required>
  <option value="English" selected>English</option>
  <option value="German">German</option>
  <option value="French">French</option>
  <option value="Spanish">Spanish</option>
  </select>
    <br/>

    <input type="submit" class="editbtn" value="save" name="submit">Save</button><br/>

    <br/><button type="button" class="questions">Asked Questions</button><br/>

</form>
</fieldset>

</body>
