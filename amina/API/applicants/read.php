<?php
/**
 * Created by PhpStorm.
 * User: Akhuwat
 * Date: 11/9/2017
 * Time: 12:00 PM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/applicants.php';

$database = new Database();
$db = $database->getConnection();

$applicants = new Applicants($db);

$stmt = $applicants->read();
$num = $stmt->rowCount();

if($num>0){

    $applicants_arr=array();
    $applicants_arr["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $applicants_item=array(
            "id" => $id,
            'name' => $name,
            'father_name' => $father_name,
            'cnic' => $cnic,
            'gender' => $gender,
            'country' => $country,
            'province' => $province,
            'districts' => $districts,
            'address' => $address,
            'created_on' => $created_on,
            'updated_on' => $updated_on,
            'status' => $status,
            'incidence_id' => $incidence_id,
            'title' => $title
        );

        array_push($applicants_arr["records"], $applicants_item);
    }

    echo json_encode($applicants_arr);
}

else{
    echo json_encode(
        array("message" => "No Applicants found.")
    );
}
?>
