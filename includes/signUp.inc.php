<?php

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $password = $_POST['password'];
    $passreap = $_POST['passwordRepeat'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    include "../classes/dbCon.class.php";
    include "../classes/signUp/signUp.class.php";
    include "../classes/signUp/signUpControl.class.php";



    $signup = new SignupContr($f_name,$l_name,$password,$passreap,$email,$phone);



    $signup->signupUser();


