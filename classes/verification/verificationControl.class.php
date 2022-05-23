<?php

class VerificationControl extends Verification{
    private $email;
    private $code;
    private $input;
    private $operation;
    public function __construct($email,$input,$operation)
    {
        $this->email = $email;
        $this->code = uniqid();
        $this->input = $input;
        $this->operation = $operation;
    }

    public function GenerateCode(){
        if($this->checkUser($this->email) === false){
            $array= array(
                'error'=>'Invalid Email'
            );
            print_r(json_encode($array));
        }else{
            $this->InsertCode($this->email,$this->code);
        }
    }

    public function CheckCodeControl(){
        if($this->checkUser($this->email) === false){
            $array= array(
                'error'=>'Invalid Email'
            );
            print_r(json_encode($array));
        }else{
        $this->CheckCode($this->email,$this->input,$this->operation);
        }
    }


}