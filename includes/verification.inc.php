<?php
session_start();

require "../classes/dbCon.class.php";
require "../classes/verification/verification.class.php";
require "../classes/verification/verificationControl.class.php";

$operation = $_POST['operation'];
$input = $_POST['input'];

if(isset($_SESSION['email']) && $_SESSION['verified'] == 0){
    $email = $_SESSION['email'];
    $code= new VerificationControl($email,$input,$operation);
    if($operation ==='generate'){
        $code->GenerateCode();
    }
    else if($operation ==='check'){
        $code->CheckCodeControl();
    }
    else{
        $array = array(
            'error'=>'Invalid Operation'
        );
        print_r(json_encode($array));
    }
    
}elseif($operation==='generateEmailReset'|| $operation==='checkEmailReset'){
    $email = $_POST['email'];
    $code = new VerificationControl($email,$input,$operation);
    if($operation==='generateEmailReset'){
        $code->GenerateCode();
    }
    else if($operation==='checkEmailReset'){
        $code->CheckCodeControl();
    }

}else{
    $array = array(
        'error'=>'Session is not set or account is verified'
    );
    print_r(json_encode($array));
}


