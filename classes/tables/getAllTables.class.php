<?php

class GetAllTables extends DbConn{

    protected function Tables(){
        $stmt= $this->connect()->prepare('SELECT * FROM tables');
        if(!$stmt->execute()){
            $stmt=null;
            $array= array(
                'error'=>'Failed to get tables'
            );
            print_r(json_encode($array));
            $stmt=null;
            exit();

        }else{
            $row = $stmt->fetchAll();
            print_r(json_encode($row));
            exit();
        }

    
    }

}