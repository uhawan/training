<?php
/**
 * Created by PhpStorm.
 * User: Akhuwat
 * Date: 11/9/2017
 * Time: 11:57 AM
 */
class Applicants
{
    public $conn;
    private $table_name = "applicants";

    public $id;
    public $name;
    public $fathername;
    public $cnic;
    public $gender;
    public $country;
    public $province;
    public $districts;
    public $address;
    public $description;
    public $created_on;
    public $updated_on;
    public $status;
    public $incidence_id;

    public function __construct($db){
        $this->conn = $db;
    }

    function read()
    {
        $query="SELECT * FROM applicants as a INNER JOIN incidences as i ON a.incidence_id = i.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}