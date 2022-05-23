<?php
session_start();
if(isset($_SESSION['id'])){
    require "../classes/dbCon.class.php";
    require "../classes/adminReservationSearch/adminReservationSearch.class.php";
    require "../classes/adminReservationSearch/adminReservationSearchControl.class.php";
    
    $id = $_SESSION['id'];
    
    $reservation = new ReservationSearchControl(null,null);
    $reservation->SetId($id);
    $reservation->SearchResByIdControl();
}else{
    $array= array(
        'error'=>'Session is not set!'
    );
    print_r(json_encode($array));
}


