<?php

class DB
{
    protected $host = '127.0.0.1';
    protected $db = 'libary';
    protected $user = 'root';
    protected $pass = '';
    protected $charset = 'utf8';
    protected static $dbObject;
    protected static $DB = '';
    protected $pdo = '';

    private function  __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
    }

    /**
     * @return DB|string
     *
     * singletone
     */
    static function getObject()
    {
        if (!self::$DB) {
            self::$DB = new self;
        }
        return self::$DB;

//        return
    }

    /**
     * @param $email
     * @return mixed
     *
     *
     * return pass or false
     */
    function ifIsSetUser($email)
    {
//        var_dump($email);
        $sql = "SELECT * FROM `user` WHERE login= ?";
        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute(array($email))) {
            while ($row = $stmt->fetch()) {

                return $row['pass'];

            }
        }
        return false;
    }

    function  selectAll()
    {
        $sql = "SELECT `name`, `name_eng`, `name_righter` FROM `book`, `righter` WHERE book.id_righter=righter.id";

        $result=array();
        $stmt = $this->pdo->query($sql);
        $result =array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[]=$row;
//            var_dump($row);
//            echo '<br>';
        }
//        var_dump($row);
return $result;

    }
}

//$d=DB::getObject()}->ifIsSetUser('qqq@gamil.com');
//var_dump($d);
