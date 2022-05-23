<?php

class UpdateTable extends DbConn{

    protected function UpdateT($tablePosX,$tablePosY,$aboutTable,$tableNumSeats,$tableSize,$tableRotate,$tableId){
        $stmt= $this->connect()->prepare('UPDATE tables SET position_x = ?, position_y = ?,about_table = ?,num_of_seats = ?,size = ?,rotate =? WHERE table_id = ?;');
        if(!$stmt->execute(array($tablePosX,$tablePosY,$aboutTable,$tableNumSeats,$tableSize,$tableRotate,$tableId))){
            $stmt=null;
            $array= array(
                'error'=>'Failed to get tables'
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