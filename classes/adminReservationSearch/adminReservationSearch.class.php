<?php

class ReservationSearch extends DbConn{

    protected function SearchRes($date,$string){
        $stmt= $this->connect()->prepare('SELECT * FROM reservation 
        LEFT JOIN users
        on users.user_id = reservation.user_id
        WHERE start_time LIKE ?
        AND (
        users.f_name LIKE ? OR
        users.l_name LIKE ? OR
        users.email LIKE ? OR
        users.phone LIKE ? 
        )
        order by reservation.start_time asc;');
        if(!$stmt->execute(array($date,$string,$string,$string,$string))){
            $stmt=null;
            $array= array(
                'error'=>'Failed to get reservations'
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

    protected function SearchResById($id){
        $stmt= $this->connect()->prepare('SELECT * FROM reservation WHERE user_id = ?');
        if(!$stmt->execute(array($id))){
            $stmt=null;
            $array= array(
                'error'=>'Failed to get reservations'
            );
            print_r(json_encode($array));
            $stmt=null;
            exit();

        }else if($stmt->rowCount() > 0){
            $row = $stmt->fetchAll();
            $nowDate = date("Y-m-d H:i");
            $nowDate = strtotime($nowDate);
            foreach( $row as $i ){
                $resDate = $i['end_time'];
                $resDate = strtotime($resDate);
                if($resDate <= $nowDate){
                    $result[0][] = $i;
                }else{
                    $result[1][] = $i;
                }
            }
            print_r(json_encode($result));
            exit();
        }
        else {
            print_r('No reserevations were found for this user');
            exit();
        }
    }
}