<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$temp1="";
$temp2="";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'lang_first_db');
    $username=$_SESSION['Username'];
    $name = mysqli_real_escape_string($db, $_POST['fname']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    foreach ($_POST['pro_language'] as $selectedOption)
        $temp1 .= $selectedOption . ",";
    $temp1= substr($temp1, 0, -1);
    $pro_language = mysqli_real_escape_string($db, $temp1);
    foreach ($_POST['curr_language'] as $selectedOption1)
        $temp2 .= $selectedOption1 . ",";
    $temp2= substr($temp1, 0, -1);
    $curr_language = mysqli_real_escape_string($db, $temp1);

    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
    else{
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

/* Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
} */
// Allow certain file formats
if($uploadOk ==1)
{
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "<br/>"."Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    } 
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br/>"."Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $dp = $username.'.'.$imageFileType;
        $sql  = "UPDATE lang_first_tb SET DP='$dp' WHERE Username='$username' ";
        mysqli_query($db, $sql);
        rename($target_file, 'uploads/'.$dp);
        } 
     else {
        echo "<br/>"."Sorry, there was an error uploading your file.";
    }
}
if (isset($_SESSION['Username']))
{
    echo "<br/>"."Details updated successfully.";
    $sql  = "UPDATE lang_first_tb SET FullName='$name', Age='$age', Email='$email', Proficient_Language='$pro_language', Current_Language='$curr_language' WHERE Username='$username' ";
    mysqli_query($db, $sql);
}
    header('refresh:5; url=profile page.php');
?>