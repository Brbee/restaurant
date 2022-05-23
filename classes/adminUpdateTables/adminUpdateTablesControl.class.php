<?php

class UpdateTableControl extends UpdateTable{
    private $tableId;
    private $tablePosX;
    private $tablePosY;
    private $tableNumSeats;
    private $tableSize;
    private $tableRotate;
    private $aboutTable;

    public function __construct($tablePosX,$tablePosY,$aboutTable,$tableNumSeats,$tableSize,$tableRotate,$tableId)
    {
        $this->tableId=$tableId;
        $this->tablePosX=$tablePosX;
        $this->tablePosY=$tablePosY;
        $this->tableNumSeats=$tableNumSeats;
        $this->tableSize=$tableSize;
        $this->tableRotate=$tableRotate;
        $this->aboutTable=$aboutTable;
    }

    public function UpdateTables(){
        if($this->IsNummeric() == false){
            $array= array(
                'error'=>'Input must be numeric'
            );
            print_r(json_encode($array));
            exit();
        }
        if($this->SizeCheck() == false){
            $array= array(
                'error'=>'Incorrect size input'
            );
            print_r(json_encode($array));
            exit();
        }
        $this->UpdateT($this->tablePosX,$this->tablePosY,$this->aboutTable,$this->tableNumSeats,$this->tableSize,$this->tableRotate,$this->tableId);
    }

    private function IsNummeric(){
        if(!is_numeric($this->tableId) || !is_numeric($this->tablePosX) || !is_numeric($this->tablePosY) || !is_numeric($this->tableNumSeats) || !is_numeric($this->tableRotate) || !is_numeric($this->aboutTable)){
            return false;
        }else{
            return true;
        }   
    }
    private function SizeCheck(){
        if($this->tableSize === 'L' || $this->tableSize === 'M' || $this->tableSize === 'S'){
            return true;
        }
        else{
            return false;
        }
    }
    

}