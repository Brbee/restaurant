<?php
require "../classes/dbCon.class.php";
require "../classes/login/login.class.php";
require "../classes/login/loginControl.class.php";

    $email = $_POST['email'];
    $password = $_POST['password'];


    $login = new LoginContr($email,$password);

    $login->Login();



   
