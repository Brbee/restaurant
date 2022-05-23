<?php

class workerFunctions extends DbConn{
    protected function showed_up($id,$toggle){
        $stmt= $this->connect()->prepare('update reservation SET showed_up = ? WHERE reservation_id = ?');
        if(!$stmt->execute(array($toggle,$id))){
            $stmt=null;
            $array= array(
                'error'=>'Failed to update reservations'
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

    protected function Comment($id,$comment){
        $stmt= $this->connect()->prepare('update reservation SET comment = ? WHERE reservation_id = ?');
        if(!$stmt->execute(array($comment,$id))){
            $stmt=null;
            $array= array(
                'error'=>'Failed to update reservations'
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