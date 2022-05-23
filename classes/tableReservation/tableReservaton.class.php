<?php

class TableReservation extends DbConn{

    protected function CheckIfTableIsFree($start,$end,$tableId){
        $stmt= $this->connect()->prepare("
        SELECT * from (
            SELECT tables.table_id as a,tables.position_x as position_x,tables.position_y as position_y,tables.about_table as about_table,tables.num_of_seats as num_of_seats,tables.size as size,tables.rotate as rotate, count(*) as cx 
            FROM tables 
            left join reservation 
            on reservation.table_id = tables.table_id 
            WHERE not (( reservation.start_time >= ? AND ? BETWEEN reservation.start_time and reservation.end_time)
            OR ( ? BETWEEN reservation.start_time and reservation.end_time and ? >= reservation.end_time)
            OR ( ? >= reservation.start_time and ? <= reservation.end_time)
            OR ( ?<= reservation.start_time and ? >= reservation.end_time))
            OR (reservation.start_time is null AND reservation.end_time is null)
            group by tables.table_id
            ORDER by tables.table_id asc) as x
        LEFT join (SELECT tables.table_id as a, count(*) as cy 
        FROM tables 
        left join reservation 
        on reservation.table_id = tables.table_id 
        group by tables.table_id 
        ORDER by tables.table_id asc) as y
        on x.a = y.a
        WHERE x.cx = y.cy
        ;");
                if(!$stmt->execute(array($start,$end,$start,$end,$start,$end,$start,$end))){
            $stmt=null;
            $array= array(
                'error'=>'Reservation failed, try again later!'
            );
            print_r(json_encode($array));
            exit();

        }else{
            $flag = false;
            $row = $stmt->fetchAll();
            foreach($row as $element){
                if($element['a'] == $tableId){
                    $flag = true;
                }
            }
            return $flag;
        }

    }

    protected function ReserveTable($start,$end,$tableId,$userId){
        $stmt = $this->connect()->prepare('INSERT into reservation(user_id,table_id,start_time,end_time) VALUES(?,?,?,?);');
        if(!$stmt->execute(array($userId,$tableId,$start,$end))){
            $stmt=null;
            $array= array(
                'error'=>'Reservation failed, try again later!'
            );
            print_r(json_encode($array));
            exit();

        }else{
            $array= array(
                'error'=>'success'
            );
            print_r(json_encode($array));
        }
    }
}