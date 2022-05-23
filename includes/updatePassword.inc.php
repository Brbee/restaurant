<?php
session_start();

require "../classes/dbCon.class.php";
require "../classes/NewPassword/NewPassword.class.php";
require "../classes/NewPassword/NewPasswordControl.class.php";

if(isset($_SESSION['EmailReset'])){

    $password = $_POST['password'];
    $passwordReap = $_POST['passwordReap'];
    $email = $_SESSION['EmailReset'];

    $resetEmail = new NewPasswordControl($password,$passwordReap,$email);
    $resetEmail->SetNewPasswordControl();
}
else{
    $array= array(
        'error'=>'Session Not Set'
    );
    print_r(json_encode($array));
}
