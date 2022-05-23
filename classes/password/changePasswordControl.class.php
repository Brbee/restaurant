<?php

class ChangePasswordControl extends ChangePassword {
    public function UpdatePasswordControl($password, $passwordRepeat) {
        if($this->passwordVaild($password) == false){
            $array = array(
                'error' => 'Password Must Contain 8 Characters (Letters, Number and Special Character)'
            );
            print_r(json_encode($array));
            exit();
        }
        $this->UpdatePassword($password, $passwordRepeat);
    }


    private function passwordVaild($password)
    {
        $number = preg_match('@[0-9]@', $password);
        $lowercase = preg_match('@[a-z A-Z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (strlen($password) < 8 || !$number  || !$lowercase || !$specialChars) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}