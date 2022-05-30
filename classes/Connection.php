<?php

class ConnectionManager
{
    public static function getConnection($db_name){
        $host = "localhost";
        $username = "root";
        $password = "_983@Luke@983_";

        return mysqli_connect($host,
            $username, $password, $db_name);
    }

}