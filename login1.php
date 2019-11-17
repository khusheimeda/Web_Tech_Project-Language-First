<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'lang_first_db');
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (isset($_POST['login_btn']))
{
    $username = mysqli_real_escape_string($db, $_POST['uname']);
    $pswd = mysqli_real_escape_string($db, $_POST['pswd']);
    $enc_password = md5($pswd);
    //$enc_password = password_hash($pswd, PASSWORD_DEFAULT);
    $errors= array();
}

if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($pswd)) { array_push($errors, "Password is required"); }
$user_check_query = "SELECT * FROM lang_first_tb WHERE Username='$username'  LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user && count($errors) == 0) { 
    if((strcasecmp($user['Username'], $username) === 0) && strpos($enc_password, $user['Enc_Password']) !== false){
        header('refresh:1; url=main.html');
    }
    else
    {
        array_push($errors, "Incorrect password.");
        foreach($errors as $x)
            echo $x;
        header('refresh:5; url=login.html');
    }
}
else
{
    array_push($errors, "User doesn't exist.");
    foreach($errors as $x)
        echo $x;
    header('refresh:5; url=login.html');
}

?>