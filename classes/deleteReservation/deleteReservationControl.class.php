<?php

class DeleteReservationControl extends DeleteReservation{
    
    private $id;
    private $userId;

    public function __construct($id,$userId)
    {
        $this->id = $id;
        $this->userId = $userId;     
    }

    public function DeleteReservationControl(){
        if($this->CheckIfUserIsValid() == false){
            $array= array(
                'error'=>'You Can\'t Delete/Change That Reservation!'
            );
            print_r(json_encode($array));
            exit();
        }
        $resDate = $this->GetReservationDate($this->id);
        $nowDate = date("Y-m-d H:i");
        $resDate = strtotime($resDate);
        $nowDate = strtotime($nowDate);
        $diff = ($resDate - $nowDate) *60*60;
        if($diff >= 3.9){
            $this->DeleteReservation($this->id);
        }else{
            $array= array(
                'error'=>'You Can\'t Cancel Or Change Reservation 4 Hours Before Start of Your Reservation'
            );
            print_r(json_encode($array));
        }
    }

    public function CheckReservationChange(){
        if($this->CheckIfUserIsValid() == false){
            $array= array(
                'error'=>'You Can\'t Delete/Change That Reservation!'
            );
            print_r(json_encode($array));
            exit();
        }
        $resDate = $this->GetReservationDate($this->id);
        $nowDate = date("Y-m-d H:i");
        $resDate = strtotime($resDate);
        $nowDate = strtotime($nowDate);
        $diff = ($resDate - $nowDate) *60*60;
        if($diff >= 4){
            $array= array(
                'error'=>'success'
            );
            print_r(json_encode($array));
        }else{
            $array= array(
                'error'=>'You Can\'t Cancel Or Change Reservation 4 Hours Before Start of Your Reservation'
            );
            print_r(json_encode($array));
        }

    }

    private function CheckIfUserIsValid(){
        $res = $this->GetReservationFromId($this->userId);
        $flag = false;
        foreach($res as $i){
            if($i['reservation_id'] == $this->id){
                $flag = true;
            }
        }
        if($flag){
            return true;
        }else{
            return false;
        }
    }
}