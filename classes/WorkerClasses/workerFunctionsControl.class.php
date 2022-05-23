<?php

class workerFunctionsComtrol extends workerFunctions{
    public function SetComment($id,$comment){
        $this->Comment($id,$comment);
    }
    public function Setshowed_up($id,$toggle){
        $this->showed_up($id,$toggle);
    }
}