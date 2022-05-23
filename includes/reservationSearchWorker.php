<?php


$string = $_POST['string'];
$string = '%' . $string . '%';

require "../classes/dbCon.class.php";
require "../classes/adminReservationSearch/adminReservationSearch.class.php";
require "../classes/adminReservationSearch/adminReservationSearchControl.class.php";


$reservation = new ReservationSearchControl("%".date('Y-m-d')."%",$string);
$reservation->SearchResControl();

