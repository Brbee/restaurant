<?php
session_start();
if(isset($_SESSION['id'])){
    $start = $_POST['start'];
    $end = $_POST['end'];
    $tableId = $_POST['tableId'];
    $userId = $_SESSION['id'];
    
    require "../classes/dbCon.class.php";
    require "../classes/tableReservation/tableReservaton.class.php";
    require "../classes/tableReservation/tableReservationControl.class.php";
    
    $insertTable = new TableReservationControl($start,$end,$tableId,$userId);
    $insertTable-> InsertTableIntoReservations();
}else{
    $array = array(
        "error"=>'Not logged in'
    );
    print_r(json_encode($array));
}

