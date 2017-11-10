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
    public $father_name;
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
        $query="SELECT a.id,a.name,a.father_name,a.cnic,a.address,a.gender,a.status,a.created_on,a.updated_on,a.incidence_id,a.country,a.province,a.districts,i.title,i.id as inc_id FROM " . $this->table_name . " as a INNER JOIN incidences as i ON a.incidence_id = i.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function create()
    {
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, father_name=:father_name, cnic=:cnic, address=:address, country=:country, province=:province, districts=:districts, gender=:gender, created_on=:created_on, updated_on=:updated_on, status=:status, incidence_id=:incidence_id";

        $stmt = $this->conn->prepare($query);

        $date = date("Y-m-d H:i:s");
        $status = 1;
        $incidence_id = 3;
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->father_name=htmlspecialchars(strip_tags($this->father_name));
        $this->cnic=htmlspecialchars(strip_tags($this->cnic));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->country=htmlspecialchars(strip_tags($this->country));
        $this->province=htmlspecialchars(strip_tags($this->province));
        $this->districts=htmlspecialchars(strip_tags($this->districts));
        $this->created_on=htmlspecialchars(strip_tags($date));
        $this->updated_on=htmlspecialchars(strip_tags($date));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
        $this->status=htmlspecialchars(strip_tags($status));
        $this->incidence_id=htmlspecialchars(strip_tags($incidence_id));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":father_name", $this->father_name);
        $stmt->bindParam(":cnic", $this->cnic);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":province", $this->province);
        $stmt->bindParam(":districts", $this->districts);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":created_on", $date);
        $stmt->bindParam(":updated_on", $date);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":incidence_id", $incidence_id);
        // execute query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function delete()
    {

        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }

        return false;

    }

    function update(){

        // update query
        $query = "UPDATE
                " . $this->table_name . " 
            SET
                name=:name, father_name=:father_name, cnic=:cnic, address=:address, country=:country, province=:province, districts=:districts, gender=:gender, created_on=:created_on, updated_on=:updated_on, status=:status, incidence_id=:incidence_id
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        $date = date("Y-m-d H:i:s");
        $status = 1;
        $incidence_id = 3;
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->father_name=htmlspecialchars(strip_tags($this->father_name));
        $this->cnic=htmlspecialchars(strip_tags($this->cnic));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->country=htmlspecialchars(strip_tags($this->country));
        $this->province=htmlspecialchars(strip_tags($this->province));
        $this->districts=htmlspecialchars(strip_tags($this->districts));
        $this->created_on=htmlspecialchars(strip_tags($date));
        $this->updated_on=htmlspecialchars(strip_tags($date));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
        $this->status=htmlspecialchars(strip_tags($status));
        $this->incidence_id=htmlspecialchars(strip_tags($incidence_id));


        // bind new values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":father_name", $this->father_name);
        $stmt->bindParam(":cnic", $this->cnic);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":province", $this->province);
        $stmt->bindParam(":districts", $this->districts);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":created_on", $date);
        $stmt->bindParam(":updated_on", $date);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":incidence_id", $incidence_id);
        $stmt->bindParam(':id', $this->id);
//print_r($stmt);
//die();
        // execute the query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function readOne(){

        // query to read single record
        $query = "SELECT  * FROM
                " . $this->table_name . " a INNER JOIN incidences as i ON a.incidence_id = i.id WHERE
                a.id = ?"  ;

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['name'];
        $this->father_name = $row['father_name'];
        $this->gender = $row['gender'];
        $this->address = $row['address'];
        $this->cnic = $row['cnic'];
        $this->country = $row['country'];
        $this->province = $row['province'];
        $this->districts = $row['districts'];

    }
}