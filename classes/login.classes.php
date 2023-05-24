<?php

class LoginCont extends Dbh
{

    public function getUser($userName,  $password)
    {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? OR email = ?');



        if (!$stmt->execute(array($userName,   $userName))) {
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location:../index.php?error=usernotfound");
            exit();
        }
        $pwdHashed = $stmt->fetch(PDO::FETCH_ASSOC)['password'];
        $checkpwd = password_verify($password, $pwdHashed);


        if ($checkpwd == false) {
            $stmt = null;
            header("location:../index.php?error=wrongpassword");
        } elseif ($checkpwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE (username = ? OR email = ?) AND password = ?;');
            if (!$stmt->execute(array($userName, $userName,  $pwdHashed))) {
                $stmt = null;
                header("location:../index.php?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location:../index.php?error=usernotfound");
                exit();
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];
            $stmt = null;
        }


        $stmt = null;
    }
}
