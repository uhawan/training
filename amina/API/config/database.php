<?php
/**
 * Created by PhpStorm.
 * User: Akhuwat
 * Date: 11/9/2017
 * Time: 11:52 AM
 */
class database
{
    private $host = "localhost";
    private $db_name = "recordapp";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
