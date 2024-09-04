<?php

Class Database{
    protected $bdd;

    public function __construct(){
        $host = 'localhost';
        $user = 'root';
        $password = 'root';
        $dbname = 'lp_official';

        $this->bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    }

    public function getConnection(): PDO{

        return $this->bdd;
    }
}
