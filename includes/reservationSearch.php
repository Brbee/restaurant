<?php


$date = $_POST['date'];
$string = $_POST['string'];
$date = $date . "%";
$string = '%' . $string . '%';
require "../classes/dbCon.class.php";
require "../classes/adminReservationSearch/adminReservationSearch.class.php";
require "../classes/adminReservationSearch/adminReservationSearchControl.class.php";

$reservation = new ReservationSearchControl($date,$string);
$reservation->SearchResControl();
