<?php
class login extends DbConn
{
    protected function getLogin($email, $password)
    {
        $stmt = $this->connect()->prepare("SELECT email, password, user_id, role FROM users WHERE email=?");
        if (!$stmt->execute(array($email))) {
            $array = array(
                'error' => 'stmt Fail!'
            );
            print_r(json_encode($array));
            exit();
        } else if ($stmt->rowCount() <= 0) {
            $array = array(
                'error' => 'incorrect Email'
            );
            print_r(json_encode($array));
            exit();
        } else {

            $row = $stmt->fetchAll();
            $passwordCheck = password_verify($password, $row[0]['password']);
            if (!$passwordCheck) {
                $array = array(
                    'error' => 'Incorrect Password'
                );
                print_r(json_encode($array));
                exit();
            } else {
                $stmt1 = $this->connect()->prepare("SELECT v.verified AS verified FROM verification as v
                inner join users as u
                on u.user_id = v.user_id
                 WHERE u.email=?");
                if (!$stmt1->execute(array($email))) {
                    $array = array(
                        'error' => 'stmt Fail!'
                    );
                    print_r(json_encode($array));
                    exit();
                } else {
                    $row1 = $stmt1->fetchAll();
                    if($row1[0]['verified'] != 1){
                        $array= array(
                            'error'=>'verification'
                        );
                        print_r(json_encode($array));
                    }
                    else{
                        $array= array(
                            'error'=>'success'
                        );
                        print_r(json_encode($array));
                    }
                    session_start();
                    $_SESSION['email'] = $row[0]['email'];
                    $_SESSION['id'] = $row[0]['user_id'];
                    $_SESSION['verified'] = $row1[0]['verified'];
                    $_SESSION['role'] = $row[0]['role'];
                }
               
            }
        }
    }
}
