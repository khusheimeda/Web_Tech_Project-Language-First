<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'lang_first_db');
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (isset($_POST['login_btn']))
{
    $username = mysqli_real_escape_string($db, $_POST['uname']);
    $psw = mysqli_real_escape_string($db, $_POST['psw']);
    $enc_password = md5($psw);
    $errors= array();
}

if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($psw)) { array_push($errors, "Password is required"); }
$user_check_query = "SELECT * FROM lang_first_tb WHERE Username='$username'  LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user && count($errors) == 0) { 
    echo $enc_password;
    //if(strcasecmp($user['Username'], $username) === 0 && strcmp($user['Enc_Password'], $enc_password) === 0) {
    if($user['Username'] == $username && $user['Enc_Password'] == $enc_password) {
        echo "success";
        header('refresh:1; url=main.html');
    }
   /* else
    {
        header('refresh:2; url=login.html');
    }*/
}
else
{
  foreach($errors as $x)
  echo $x;
  header('refresh:2; url=login.html');
}

?>