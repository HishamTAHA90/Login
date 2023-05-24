<?php

class Dbh
{

    protected function connect()
    {
        try {
            $server = "localhost";
            $dbName = "ooplogin";
            $username = "root";
            $password = "";
            $dbh = new PDO("mysql:host=$server;dbname=$dbName",  $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } catch (\Throwable $e) {
            print "Error : " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
