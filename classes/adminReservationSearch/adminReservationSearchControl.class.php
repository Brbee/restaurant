<?php

class ReservationSearchControl extends ReservationSearch{
    private $date;
    private $string;
    private $id;

    public function __construct($date,$string)
    {
        $this->date=$date;
        $this->string=$string;
    }

    public function SetId($id){
        $this->id = $id;
    }

    public function SearchResControl(){
        $this->SearchRes($this->date,$this->string);
    }

    public function SearchResByIdControl(){
        $this->SearchResById($this->id);
    }

}