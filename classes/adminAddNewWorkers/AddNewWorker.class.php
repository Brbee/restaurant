<?php

class NewWorker extends DbConn {


    protected function checkUser($email){
        $stmt = $this->connect()->prepare('SELECT * FROM users where email = ?;');
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            $array= array(
                'error'=>'Stmt Fail!'
            );
            print_r(json_encode($array));
            exit();
            }

        if($stmt->rowCount()>0){
            $resultCheck =true;
        }
        else{
            $resultCheck = false;
        }
        return $resultCheck;

    }

    protected function checkPhone($phone) {
        $stmt = $this->connect()->prepare('SELECT * FROM users where phone = ?;');
        if(!$stmt->execute(array($phone))) {
            $stmt = null;
            $array = array(
                'error' => 'Empty Phone Number'
            );
            print_r(json_encode($array));
            exit();
        }
        if($stmt->rowCount()>0) {
            $resultCheck = true;
        }
        else {
            $resultCheck = false;
        }
        return $resultCheck;
    }


    protected function setUser($f_name,$l_name,$password,$email,$phone,$role){
        $stmt = $this->connect()->prepare('INSERT INTO users(f_name, l_name, password, email, phone, role) VALUES (?,?,?,?,?,?,?);');

        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

        if(!$stmt->execute(array($f_name,$l_name,$hashedPassword,$email,$phone,$role))){
            $stmt = null;
            $array= array(
                'error'=>'Stmt Fail!'
            );
            print_r(json_encode($array));
            exit();
        }else{
            $stmt=null;
            $stmt = $this->connect()->prepare('SELECT * FROM users where email = ?;');
            if(!$stmt->execute(array($email))) {
            $stmt = null;
            $array = array(
                'error' => 'stmt fail'
            );
            print_r(json_encode($array));
            exit();
            }else{
                $row = $stmt->fetchAll();
                $array= array(
                    'error'=>'success');
                    print_r(json_encode($array));
            }           
        }
    }

}