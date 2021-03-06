<?php
/**
 * Created by PhpStorm.
 * User: Akhuwat
 * Date: 11/9/2017
 * Time: 3:37 PM
 */
$arr =($_POST);
print_r($arr);

//die("we die here");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/applicants.php';

$database = new Database();
$db = $database->getConnection();

$applicants = new Applicants($db);


$data = json_decode(file_get_contents("php://input"));

// set product property values
$applicants->name = $data->name;
$applicants->father_name = $data->fname;
$applicants->cnic = $data->cnic;
$applicants->gender = $data->gender;
$applicants->address = $data->address;
$applicants->country = $data->countries;
$applicants->province = $data->provinces;
$applicants->districts = $data->districts;



if($applicants->create()){
    echo '{';
    echo '"message": "Applicants was created."';
    echo '}';
}

// if unable to create the product, tell the user
else{
    echo '{';
    echo '"message": "Unable to create Applicants."';
    echo '}';
}
