<?php
require "../classes/dbCon.class.php";
require "../classes/WorkerClasses/workerFunctions.class.php";
require "../classes/WorkerClasses/workerFunctionsControl.class.php";


$operation = $_POST['operation'];
if($_POST['operation'] == 1){
    $id = $_POST['id'];
    $toggle = $_POST['toggle'];
}
else if ($_POST['operation'] == 0){
    $id = $_POST['id'];
    $comment = $_POST['comment'];
}else{
    $array= array(
        'error'=>'Operation Not Correct!'
    );
    print_r(json_encode($array));
    exit();
}



$worker = new workerFunctionsComtrol();

if($operation){
    $worker->Setshowed_up($id,$toggle);
}else{
    $worker->SetComment($id,$comment);
}