<?php

require "../classes/dbCon.class.php";
require "../classes/tables/getAllTables.class.php";
require "../classes/tables/getAllTablesControl.class.php";

$tables = new GetAllTablesControl();
$tables->GetAllTableData();
