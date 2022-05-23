<?php

class Signup extends DbConn
{


    protected function checkUser($email)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users where email = ?;');
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            $array = array(
                'error' => 'Stmt Fail!'
            );
            print_r(json_encode($array));
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultCheck = true;
        } else {
            $resultCheck = false;
        }
        return $resultCheck;
    }

    protected function checkPhone($phone)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users where phone = ?;');
        if (!$stmt->execute(array($phone))) {
            $stmt = null;
            $array = array(
                'error' => 'Empty Phone Number'
            );
            print_r(json_encode($array));
            exit();
        }
        if ($stmt->rowCount() > 0) {
            $resultCheck = true;
        } else {
            $resultCheck = false;
        }
        return $resultCheck;
    }


    protected function setUser($f_name, $l_name, $password, $email, $phone)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users(f_name, l_name, password, email, phone) VALUES (?,?,?,?,?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($f_name, $l_name, $hashedPassword, $email, $phone))) {
            $stmt = null;
            $array = array(
                'error' => 'Stmt Fail!'
            );
            print_r(json_encode($array));
            exit();
        } else {
            $stmt = null;
            $stmt = $this->connect()->prepare('SELECT * FROM users where email = ?;');
            $stmt1 = $this->connect()->prepare('SELECT v.verified AS verified FROM verification as v
            inner join users as u
            on u.user_id = v.user_id
             WHERE u.email=?');
            if (!$stmt->execute(array($email))) {
                $stmt = null;
                $array = array(
                    'error' => 'stmt fail'
                );
                print_r(json_encode($array));
                exit();
            } else {
                if (!$stmt1->execute(array($email))) {
                    $stmt = null;
                    $array = array(
                        'error' => 'Verification stmt fail!'
                    );
                    print_r(json_encode($array));
                    exit();
                } else {
                    $row = $stmt->fetchAll();
                    $row1 = $stmt1->fetchAll();
                    $array = array(
                        'error' => 'success'
                    );
                    print_r(json_encode($array));
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
