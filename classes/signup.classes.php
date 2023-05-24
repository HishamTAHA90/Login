<?php

class UserCont extends Dbh
{

    protected function setUser($userName, $email, $password)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (username , email , password) VALUES(?,?,?);');

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($userName,  $email, $hashPassword))) {
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkUser($userName, $email)
    {
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if (!$stmt->execute(array($userName, $email))) {
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }
        $resultCheck = "";
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
