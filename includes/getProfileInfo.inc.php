<?php 
require "../classes/dbCon.class.php";
require "../classes/profile/getProfileInfo.class.php";
require "../classes/profile/getProfileInfoControl.class.php";

$profile = new GetProfileInfoControl();
$profile->GetAllProfileData();