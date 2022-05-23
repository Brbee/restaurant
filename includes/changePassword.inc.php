<?php
    require "./../classes/dbCon.class.php";
    require "./../classes/password/changePassword.class.php";
    require "./../classes/password/changePasswordControl.class.php";

    $updatePassword = new ChangePasswordControl();
    if($_POST['password'] == $_POST['passwordRep']) {
        $updatePassword->UpdatePasswordControl($_POST['password'], $_POST['passwordRep']);
    }
    else {
        header("Location:http://localhost/restaurant/pages/index.php?faileed=true");
    }
?>