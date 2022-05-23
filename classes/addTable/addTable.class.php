<?php

class AddTable extends DbConn{
    protected function AddTable(){
        $stmt= $this->connect()->prepare('INSERT INTO tables (position_x,position_y,about_table,num_of_seats,size,rotate) VALUES (50,50," ",6,"L",0);');
        if(!$stmt->execute(array())){
            $stmt=null;
            $array= array(
                'error'=>'Failed to Add table'
            );
            print_r(json_encode($array));
            $stmt=null;
            exit();

        }else{
            $array= array(
                'error'=>'success'
            );
            print_r(json_encode($array));
            exit();
        }
    }
}