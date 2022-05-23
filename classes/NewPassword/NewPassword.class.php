<?php

class NewPassword extends DbConn{
    protected function SetNewPassword($password,$email){
        $passwordHesh = password_hash($password,PASSWORD_DEFAULT);
        $stmt= $this->connect()->prepare('Update users set password = ? where email = ?');
        if(!$stmt->execute(array($passwordHesh,$email))){
            $stmt=null;
            $array= array(
                'error'=>'Failed update password'
            );
            print_r(json_encode($array));
            $stmt=null;
            exit();

        }else{
            $array= array(
                'error'=>'success'
            );
            print_r(json_encode($array));
            session_unset();
            session_destroy();
            exit();
        }

    
    }

    // return true if an email was found
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

}