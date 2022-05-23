<?php


$tableId = $_POST['tableId'];
$tablePosX = $_POST['tablePosX'];
$tablePosY = $_POST['tablePosY'];
$tableNumSeats = $_POST['tableNumSeats'];
$tableSize = $_POST['tableSize'];
$tableRotate = $_POST['tableRotate'];
$aboutTable = $_POST['aboutTable'];

require "../classes/dbCon.class.php";
require "../classes/adminUpdateTables/adminUpdateTables.class.php";
require "../classes/adminUpdateTables/adminUpdateTablesControl.class.php";

$tables = new UpdateTableControl($tablePosX,$tablePosY,$aboutTable,$tableNumSeats,$tableSize,$tableRotate,$tableId);
$tables->UpdateTables();
