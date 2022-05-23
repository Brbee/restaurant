<?php

class UpdateProfileInfoControl extends UpdateProfileInfo {

    private $f_name;
    private $l_name;
    private $email;
    private $phone;

    public function __construct($f_name, $l_name, $email, $phone)
    {
        $this->f_name = $f_name;   
        $this->l_name = $l_name;   
        $this->email = $email;   
        $this->phone = $phone;   
    }
    public function UpdateAllProfileData() {
        if ($this->emailValid() == false) {
            $array = array(
                'error' => 'Email Is Not Valid'
            );
            print_r(json_encode($array));
            exit();
        }
        if ($this->emptyInput() == false) {
            $array = array(
                'error' => 'Empty Input'
            );
            print_r(json_encode($array));
            exit();
        }
        if ($this->invalidFirstName() == false) {
            $array = array(
                'error' => 'Invalid First Name'
            );
            print_r(json_encode($array));
            exit();
        }
        if ($this->invalidLastName() == false) {
            $array = array(
                'error' => 'Invalid Last Name'
            );
            print_r(json_encode($array));
            exit();
        }
        if ($this->phoneTaken() == true) {
            $array = array(
                'error' => 'Phone is Taken'
            );
            print_r(json_encode($array));
            exit();
        }
        if ($this->phoneNumber() == false) {
            $array = array(
                'error' => 'Phone can only be a number!'
            );
            print_r(json_encode($array));
            exit();
        }

        $this->UpdateProfile($this->f_name, $this->l_name, $this->email, $this->phone);
    }
    private function emailValid()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function  emptyInput()
    {
        if (empty($this->email) || empty($this->phone) || empty($this->f_name) || empty($this->l_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidFirstName()
    {
        if (!preg_match("/^[a-zA-Z]*$/", $this->f_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidLastName()
    {
        if (!preg_match("/^[a-zA-Z]*$/", $this->l_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function phoneTaken()
    {
        if ($this->checkPhone($this->phone)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    private function phoneNumber()
    {
        if (!preg_match("/^[0-9]*$/", $this->phone)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}