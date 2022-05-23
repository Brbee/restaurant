<?php


$start = $_POST['start'];
$end = $_POST['end'];

require "../classes/dbCon.class.php";
require "../classes/tables/getFreeTables.class.php";
require "../classes/tables/getFreeTablesControl.class.php";

$tables = new GetFreeTablesControl($start,$end);
$tables->GetFreeTableData($start,$end);
