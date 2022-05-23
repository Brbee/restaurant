<?php

class GetFreeTablesControl extends GetFreeTables{

    private $start;
    private $end;
    public function __construct($start,$end)
    {
        $this->start = $start;
        $this->end = $end;
    }
    public function GetFreeTableData(){
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
        $this->FreeTables($this->start,$this->end);
    }

    public function CheckDataStart(){
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

    public function CheckDataEnd(){
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

}