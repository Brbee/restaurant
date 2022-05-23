<?php
session_start();

include "../classes/dbCon.class.php";
include "../classes/deleteReservation/deleteReservation.class.php";
include "../classes/deleteReservation/deleteReservationControl.class.php";

$id = $_POST['id'];
$operation = $_POST['operation'];
$userId = $_SESSION['id'];
$deleteTable = new DeleteReservationControl($id,$userId);
if($operation ==='check'){
    $deleteTable->CheckReservationChange();
}else{
    $deleteTable->DeleteReservationControl();
}

