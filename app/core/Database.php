<?php
defined('ROOTPATH') OR die(http_response_code(404));

class Database
{
    use SingleTon;
    protected static ?PDO $con = null;
    public function __construct()
    {
        try {
             self::$con = new PDO(DB_TYPE . ":host=". DB_HOST .";dbname=" . DB_NAME, DB_USER, DB_PASS);
        }catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //read
    public function read($query, array $data = []): bool|array
    {
        $stm = self::$con->prepare($query);
        $check= $stm->execute($data);

        if ($check) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    //write its using for example delete
    public function write($query,  $data = []): bool
    {
        $stm = self::$con->prepare($query);
        $result = $stm->execute($data);
        if ($result) {
            return true;
        }
        return false;
    }
}


