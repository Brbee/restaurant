<?php

class FindWorkersControl extends FindWorkers{
    public function FindAllWorkersControl(){
        $this->FindAllWorkers();
    }
    public function DeleteWorkerControl($id){
        $this->DeleteWorker($id);
    }
    public function UpdateWorkerControl($id, $f_name, $l_name, $phone, $email){
        $this->UpdateWorker($id, $f_name, $l_name, $phone, $email);
    }
}