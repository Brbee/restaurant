<?php
class SignupContr extends Signup
{

    private $f_name;
    private $l_name;
    private $password;
    private $passreap;
    private $email;
    private $phone;

    public function __construct($f_name, $l_name, $password, $passreap, $email, $phone)
    {
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->password = $password;
        $this->passreap = $passreap;
        $this->email = $email;
        $this->phone = $phone;
    }
    public function signupUser()
    {
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
        if ($this->passMatch() == false) {
            $array = array(
                'error' => 'Passwords don\'t match'
            );
            print_r(json_encode($array));
            exit();
        }
        if ($this->userTaken() == false) {
            $array = array(
                'error' => 'Email is Taken'
            );
            print_r(json_encode($array));
            exit();
        }
        if ($this->phoneTaken() == false) {
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
        if($this->passwordVaild() ==false){
            $array = array(
                'error' => 'Password Must Contain 8 Characters (Letters, Number and Special Character)'
            );
            print_r(json_encode($array));
            exit();
        }
        $this->setUser($this->f_name, $this->l_name, $this->password, $this->email, $this->phone);
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
        if (empty($this->email) || empty($this->passreap) || empty($this->password) || empty($this->phone) || empty($this->f_name) || empty($this->l_name)) {
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
    private  function passMatch()
    {
        if ($this->password !== $this->passreap) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function userTaken()
    {
        if ($this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function phoneTaken()
    {
        if ($this->checkPhone($this->phone)) {
            $result = false;
        } else {
            $result = true;
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
    private function passwordVaild()
    {

        $number = preg_match('@[0-9]@', $this->password);
        $lowercase = preg_match('@[a-z A-Z]@', $this->password);
        $specialChars = preg_match('@[^\w]@', $this->password);

        if (strlen($this->password) < 8 || !$number  || !$lowercase || !$specialChars) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
