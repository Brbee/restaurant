<?php
session_start();
if($_SESSION['role'] ===2){


    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $password = $_POST['password'];
    $passreap = $_POST['passwordRepeat'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    include "../classes/dbCon.class.php";
    include "../classes/adminAddNewWorkers/AddNewWorker.class.php";
    include "../classes/adminAddNewWorkers/AddNewWorkerControl.class.php";



    $signup = new NewWorkerControl($f_name,$l_name,$password,$passreap,$email,$phone);



    $signup->addWorker();
}


