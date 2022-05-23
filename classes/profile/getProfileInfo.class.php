<?php
session_start();
class GetProfileInfo extends DbConn{
    protected function Profile() {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_id = '$_SESSION[id]'");
        if(!$stmt->execute()) {
            $stmt=null;
            $array= array(
                'error'=>'stmtFailSelectFirst'
            );
            print_r(json_encode($array));
            $stmt=null;
            exit();
        } else {
            $row = $stmt->fetchAll();
            print_r(json_encode($row));
            exit();
        }
    }
}