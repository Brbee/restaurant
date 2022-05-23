<?php
session_start();
class UpdateProfileInfo extends DbConn{
    protected function UpdateProfile($f_name, $l_name, $email, $phone) {
        $stmt = $this->connect()->prepare("UPDATE users SET f_name = ?, l_name = ?, email = ?, phone = ? WHERE user_id = ?");
        if(!$stmt->execute(array($f_name, $l_name, $email, $phone, $_SESSION['id']))) {
            $stmt=null;
            $array= array(
                'error'=>'stmtFailSelectFirst'
            );
            print_r(json_encode($array));
            exit();
        } else {
            header("Location:http://localhost/Restaurant/pages");
            exit();
        }
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
}