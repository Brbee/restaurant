<?php

class NewPasswordControl extends NewPassword{
    private $password;
    private $passwordReap;
    private $email;

    public function __construct($password,$passwordReap,$email)
    {
        $this->password = $password;
        $this->passwordReap = $passwordReap;
        $this->email = $email;
    }

    public function SetNewPasswordControl(){
        if(empty($this->password) || empty($this->passwordReap)){
            $array = array(
                'error'=>'Empty input'
            );
            print_r(json_encode($array));
        }else if($this->checkUser($this->email) === false){
            $array = array(
                'error'=>'incorrect Email'
            );
            print_r(json_encode($array));
        }
        else if($this->password!==$this->passwordReap){
            $array = array(
                'error'=>'Passwords Don\'t match'
            );
            print_r(json_encode($array));
        }
        else if($this->passwordVaild() == false){
            $array = array(
                'error' => 'Password Must Contain 8 Characters (Letters, Number and Special Character)'
            );
            print_r(json_encode($array));
        }
        else{
            $this->SetNewPassword($this->password,$this->email);
        }
    }
    private function passwordVaild()
    {
        $number = preg_match('@[0-9]@', $this->password);
        $lowercase = preg_match('@[a-z A-Z]@', $this->password);
        $specialChars = preg_match('@[^\w]@', $this->password);

        if (strlen($this->password) < 8 || !$number || !$lowercase || !$specialChars) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}