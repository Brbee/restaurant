<?php

class FindWorkers extends DbConn{
    protected function FindAllWorkers(){
        $stmt= $this->connect()->prepare('SELECT * FROM users WHERE role = 1');
        if(!$stmt->execute()){
            $stmt=null;
            $array= array(
                'error'=>'Failed to get workers'
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
    protected function DeleteWorker($id){
        $stmt= $this->connect()->prepare('Delete from users where user_id = ?');
        if(!$stmt->execute(array($id))){
            $stmt=null;
            $array= array(
                'error'=>'Failed to delete worker'
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

    protected function UpdateWorker($id, $f_name, $l_name, $phone, $email) {
        $stmt= $this->connect()->prepare('Update users SET f_name = ?, l_name = ?, email = ?, phone = ? where user_id = ?');
        if($stmt->execute(array($f_name, $l_name, $email, $phone, $id))){
            $array= array(
                'error'=>'success'
            );
            print_r(json_encode($array));
            exit();
        }else{
            $array= array(
                'error'=>'Failed to update worker'
            );
            print_r(json_encode($array));
            $stmt=null;
            exit();
        }
    }
}