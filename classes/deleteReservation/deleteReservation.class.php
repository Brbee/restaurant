<?php

class DeleteReservation extends DbConn{
    protected function DeleteReservation($id){
        $stmt= $this->connect()->prepare('DELETE FROM reservation Where reservation_id = ?');
        if(!$stmt->execute(array($id))){
            $stmt=null;
            $array= array(
                'error'=>'Failed to delete reservation'
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
    protected function GetReservationDate($id){
        $stmt= $this->connect()->prepare('Select start_time FROM reservation Where reservation_id = ?');
        if(!$stmt->execute(array($id))){
            $stmt=null;
            $array= array(
                'error'=>'Failed to get reservation info, try again later!'
            );
            print_r(json_encode($array));
            $stmt=null;
            exit();

        }else{
            $row = $stmt->fetchAll();
            return $row[0]['start_time'];
        }
    }

    protected function GetReservationFromId($userId){
        $stmt= $this->connect()->prepare('Select reservation_id FROM reservation Where user_id = ?');
        if(!$stmt->execute(array($userId))){
            $stmt=null;
            $array= array(
                'error'=>'Failed to get reservation info, try again later!'
            );
            print_r(json_encode($array));
            $stmt=null;
            exit();

        }else{
            $row = $stmt->fetchAll();
            return $row;
        }
    }
}