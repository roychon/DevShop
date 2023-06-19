<?php

class Manager
{
    protected function dbConnect()
    {
        $HOST = "localhost";
        $DATABASE = "batch20_project"; // TODO: Add Database
        $USER = "root";
        $PWD = "root";

        $db = new PDO("mysql:host=$HOST;dbname=$DATABASE;charset=utf8", $USER, $PWD);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $db;
    }
}
