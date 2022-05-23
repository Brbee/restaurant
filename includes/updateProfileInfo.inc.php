<?php 
require "./../classes/dbCon.class.php";
require "./../classes/profile/updateProfileInfo.class.php";
require "./../classes/profile/updateProfileInfoControl.class.php";


$profile = new UpdateProfileInfoControl($_POST['f_name'],$_POST['l_name'],$_POST['email'],$_POST['phone']);
if(isset($_POST['f_name'])){
    $profile->UpdateAllProfileData();
}
else {
    header("Location:http://localhost/restaurant/pages");
}
?>