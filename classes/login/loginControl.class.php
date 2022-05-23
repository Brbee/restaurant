<?php

class LoginContr extends Login{

    private $email;
    private $password;
    public function __construct($email,$password)
    {
    $this->email = $email;
    $this->password = $password;
    }
    public function Login(){
        if($this->emptyInput() == false){
        
            $array= array(
                'error'=>'empty Input'
            );
            print_r(json_encode($array));
            return false;
        }
        $this->getLogin($this->email,$this->password);
        return true;
    }

    private function  emptyInput(){
        if(empty($this->email) ||empty($this->password)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}