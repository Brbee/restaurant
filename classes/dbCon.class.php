<?php

class DbConn
{
    protected function connect(){
        try {
            $username = 'root';
            $password = 'root';
            $dbConn = new PDO('mysql:host=localhost:3308;dbname=restaurant',$username,$password);
            return $dbConn;
        }
        catch (PDOException $e){
        print "Error!: " .$e->getMessage()."<br>";
        die();
        }

    }
}