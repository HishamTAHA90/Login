<?php

class User extends UserCont
{
    private $userName;
    private $email;
    private $password;
    private $confirmPwd;

    public function __construct($userName, $email, $password, $confirmPwd)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPwd = $confirmPwd;
    }

    private function emptyInput()
    {
        $result = "";
        if (empty($this->userName) || empty($this->email) || empty($this->password) || empty($this->confirmPwd)) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    function checkUsername()
    {
        $result = "";
        if (!preg_match("/^[a-zA-Z]+$/", $this->userName)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    function checkEmail()
    {
        $result = "";
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    function checkPassword()
    {
        $result = "";
        if ($this->password !== $this->confirmPwd) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    function checkUid()
    {
        $result = "";
        if (!$this->checkUser($this->userName, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function validatePassword()
    {
        // Supprimer les espaces en début et fin de chaîne
        $passwords = trim($this->password);

        // Vérifier que le mot de passe a au moins 8 caractères
        if (strlen($passwords) < 8) {
            return false;
        } else {
            return true;
        }
    }
    public function signupUser()
    {
        if ($this->emptyInput() == FALSE) {
            //echo empty input
            header("location:../index.php?error=emptyinput");
            exit();
        }
        if ($this->checkUsername() == FALSE) {
            //echo invalide username
            header("location:../index.php?error=username");
            exit();
        }
        if ($this->checkEmail() == FALSE) {
            //echo invalide email
            header("location:../index.php?error=email");
            exit();
        }
        if ($this->checkPassword() == FALSE) {
            //echo invalide password
            header("location:../index.php?error=password");
            exit();
        }
        if ($this->checkUid() == FALSE) {
            //echo invalide Uid
            header("location:../index.php?error=Uid");
            exit();
        }
        if ($this->validatePassword() == false) {
            header("location:../index.php?error=passwordcourt");
            exit();
        }
        $this->setUser($this->userName, $this->email, $this->password);
    }
}
