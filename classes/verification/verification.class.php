<?php

class Verification extends DbConn{

    protected function InsertCode($email,$code){
        $date = time();
        $date = $date + (1*60*60);
        $stmt = $this->connect()->prepare('UPDATE verification
        INNER JOIN users ON users.user_id = verification.user_id
        SET 
            code = ?,
            expiration_date = ?
        WHERE users.email = ?');

        $hashedCode = password_hash($code,PASSWORD_DEFAULT);
        if (!$stmt->execute(array($hashedCode,$date, $email))) {
            $stmt = null;
            $array= array(
                'error'=>'Stmt failed, try again later!'
            );
            print_r(json_encode($array));
            exit();
            
        }else{
            $headers = 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers .= 'From: rotkiv.r@yahoo.com' . "\r\n";

            $message = "
            <html>
                <body>
                    <div style='width:100%;height:100vh; displey:flex; flex-direction:column; align-items:center;justify-content:center;'>
                        <div style='background-color: blue; width=100%;'>
                            <a href='http://localhost/Restaurant/classes/verification/verifyUser.php?vkey=$hashedCode'>Verification link</a>
                        </div>
                    <div>
                </body>
            </html>
            ";

            if(!mail($email,'Verification Code',$message,$headers)){
                $array= array(
                    'error'=>'email not sent, try again later!'
                );
                print_r(json_encode($array));
                exit();
                
            }else{
                $array= array(
                    'error'=>'sent'
                );
                print_r(json_encode($array));
                exit();
            }
        }
    }

    protected function CheckCode($email,$code,$operation){
        $stmt = $this->connect()->prepare('SELECT v.code as code,v.expiration_date as expiration_date FROM verification as v 
        inner join users as  u
        on u.user_id = v.user_id
        WHERE u.email = ?');
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            $array= array(
                'error'=>'Stmt Fail!'
            );
            print_r(json_encode($array));
            exit();
            
        }else{
            $row = $stmt->fetchAll();
            $passwordCheck = password_verify($code, $row[0]['code']);
            if (!$passwordCheck) {
                $array = array(
                    'error' => 'Code Inncorrect!'
                );
                print_r(json_encode($array));
                exit();
            }else{
                $time = time();
                if($time > $row[0]['expiration_date']){
                    $array = array(
                        'error' => 'Code TimeOut!'
                    );
                    print_r(json_encode($array));
                }else{
                    $stmt1 = $this->connect()->prepare('UPDATE verification
                    INNER JOIN users ON users.user_id = verification.user_id
                    SET 
                        verification.verified = ?
                    WHERE users.email = ?');
                    if (!$stmt1->execute(array('1', $email))) {
                        $stmt1 = null;
                        $array= array(
                            'error'=>'Stmt Fail!'
                        );
                        print_r(json_encode($array));
                        exit();
                    }
                    else{
                        if($operation === 'check'){
                            $_SESSION['verified']=1;
                            $array= array(
                                'error'=>'success'
                            );
                            print_r(json_encode($array));
                        }else{
                            $_SESSION['EmailReset']=$email;
                            $array= array(
                                'error'=>'success'
                            );
                            print_r(json_encode($array));
                        }
                        
                    }
                }

                    
            }
        }
    }
    
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