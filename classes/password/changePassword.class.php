<?php
    session_start();
    class ChangePassword extends DbConn {
        protected function UpdatePassword($password, $passwordRepeat) {
            if($password == $passwordRepeat) {
                $stmt = $this->connect()->prepare("UPDATE users SET password = ? WHERE user_id = ?");
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                if(!$stmt->execute(array($passwordHash, $_SESSION['id']))) {
                    // $stmt=null;
                    // $array= array(
                    //     'error'=>'stmtFailSelectFirst'
                    // );
                    // print_r(json_encode($array));
                    // exit();
                    header("Location:http://localhost/Restaurant/pages/index.php?fail=true");
                    exit();
                }
                else {
                    header("Location:http://localhost/Restaurant/pages");
                    exit();
                }
            }
            else {
                header("Location:http://localhost/Restaurant/pages/index.php?failed=true");
                exit();
            }
        }
    }
?>