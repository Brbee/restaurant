<?php


require "../classes/dbCon.class.php";
require "../classes/adminFindWorkers/FindWorkers.class.php";
require "../classes//adminFindWorkers/FindWorkersControl.class.php";

$operation = $_POST['operation'];

$worker = new FindWorkersControl();

if($operation == 'get'){
    $worker-> FindAllWorkersControl();
}
else if($operation == 'update') {
    $id = $_POST['id'];
    $worker-> UpdateWorkerControl($id, $_POST['f_name'], $_POST['l_name'], $_POST['phone'], $_POST['email']);
}
else if($operation == 'delete'){
    $id = $_POST['id'];
    $worker->DeleteWorkerControl($id);
}



