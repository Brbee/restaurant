<?php

class DeleteTable extends DbConn{
    protected function DeleteTable($id){
        $stmt1 = $this->connect()->prepare("DELETE FROM reservation WHERE table_id = ?");
        if(!$stmt1->execute(array($id))) {
            $stmt1=null;
            $array= array(
                'error'=>'Failed to delete reservation'
            );
            print_r(json_encode($array));
            $stmt1=null;
            exit();
        }
        else {
            $stmt2= $this->connect()->prepare('DELETE FROM tables Where table_id = ?');
            if(!$stmt2->execute(array($id))){
                $stmt2=null;
                $array= array(
                    'error'=>'Failed to delete table'
                );
                print_r(json_encode($array));
                $stmt2=null;
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
}