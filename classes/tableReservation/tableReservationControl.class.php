<?php

class TableReservationControl extends TableReservation{

    private $start;
    private $end;
    private $tableId;
    private $userId;

    public function __construct($start,$end,$tableId,$userId)
    {
        $this->start=$start;
        $this->end=$end;
        $this->tableId=$tableId;
        $this->userId=$userId;
        
    }

    public function InsertTableIntoReservations(){
        if($this->CheckifEndIsLowerThanStart() == false){
            $array= array(
                'error'=>'Date Is Not Correct!'
            );
            print_r(json_encode($array));
            exit();
        }
        if($this->CheckIfItIsSameDay() == false){
            $array= array(
                'error'=>'Date Is Not Correct!'
            );
            print_r(json_encode($array));
            exit();
        }
        if($this->CheckifTimeIntervalIsValid() == false){
            $array= array(
                'error'=>'Date Interval Is Not Correct!'
            );
            print_r(json_encode($array));
            exit();
        }
        if($this->CheckDataStart() == false){
            $array= array(
                'error'=>'Start Date Is Not Correct!'
            );
            print_r(json_encode($array));
            exit();
        }
        if($this->CheckDataEnd() == false){
            $array= array(
                'error'=>'End Date Is Not Correct!'
            );
            print_r(json_encode($array));
            exit();
        }
        if($this->CheckWorkingHours() == false){
            $array= array(
                'error'=>'Date Is Not Correct!'
            );
            print_r(json_encode($array));
            exit();
        }

        if($this->CheckIfTableIsFree($this->start,$this->end,$this->tableId)){
            $this->ReserveTable($this->start,$this->end,$this->tableId,$this->userId);
        }else{
            $array= array(
                'error'=>'Table you selected is not free, try another table.'
            );
            print_r(json_encode($array));
        }
    }


    private function CheckDataStart(){
        $dateStart = strtotime('now');
        $dateEnd = strtotime('+ 32 days');
        $timeStamp = strtotime($this->start);
        if ($timeStamp < $dateStart || $timeStamp > $dateEnd ){
            return false;
        }
        else {
            return true;
        }
    }

    private function CheckDataEnd(){
        $dateStart = strtotime('now');
        $dateEnd = strtotime('+ 32 days');
        $timeStamp = strtotime($this->end);
        if ($timeStamp  < $dateStart || $timeStamp  > $dateEnd ){
            return false;
        }
        else {
            return true;
        }
    }
    private function CheckWorkingHours(){
        $split = explode (' ',strval($this->start));
        $hours = substr($split[1],0,2);
        if($hours < 8){
            return false;
        }else{
            return true;
        }
        
    }
    private function CheckifTimeIntervalIsValid(){
        $timeStampStart = strtotime($this->start);
        $timeStampEnd = strtotime($this->end);
        if($timeStampEnd - $timeStampStart > (6*(60)*(60))+0.01){
            return false;
        }else{
            return true;
        }
        
    }
    private function CheckifEndIsLowerThanStart(){
        $timeStampStart = strtotime($this->start);
        $timeStampEnd = strtotime($this->end);
        if($timeStampEnd < $timeStampStart){
            return false;
        }else{
            return true;
        }
        
    }
    private function CheckIfItIsSameDay(){
        $daysStart = substr($this->start,8,2);
        $daysEnd = substr($this->end,8,2);
        if($daysEnd != $daysStart){
            return false;
        }else{
            return true;
        }
        
    }

}