<?php

const HOST= 'localhost';
const HOST_DB='libary';
const LOGIN_DB='root';
const PASS_DB='';



class DbConnect{
    protected $host;
    protected  $database;
    protected $login;
    protected $pass;
    function __construct($host,$database,$login,$pass){
        $this->host=$host;
        $this->database=$database;
        $this->login=$login;
        $this->pass=$pass;
    }




}
try {
    $dbh = new PDO('mysql:host='.HOST.';dbname='.HOST_DB, LOGIN_DB, PASS_DB);
    foreach($dbh->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
