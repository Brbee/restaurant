<?php

class DeleteTableControl extends DeleteTable{
    
    private $id;

    public function __construct($id)
    {
        $this->id = $id;    
    }

    public function DeleteTableControl(){
        $this->DeleteTable($this->id);
    }
}