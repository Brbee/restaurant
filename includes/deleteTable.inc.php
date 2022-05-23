<?php


include "../classes/dbCon.class.php";
include "../classes/deleteTable/deleteTable.class.php";
include "../classes/deleteTable/deleteTableControl.class.php";

$id = $_POST['id'];

$deleteTable = new DeleteTableControl($id);



$deleteTable->DeleteTableControl();