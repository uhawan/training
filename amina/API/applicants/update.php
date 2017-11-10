<?php
/**
 * Created by PhpStorm.
 * User: Akhuwat
 * Date: 11/10/2017
 * Time: 11:20 AM
 */
// required headers
print_r($_REQUEST);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../objects/applicants.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$applicants = new Applicants($db);

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of product to be edited
$applicants->id = $data->id;

// set product property values
$applicants->name = $data->name;
$applicants->father_name = $data->fname;
$applicants->cnic = $data->cnic;
$applicants->gender = $data->gender;
$applicants->address = $data->address;
$applicants->country = $data->countries;
$applicants->province = $data->provinces;
$applicants->districts = $data->districts;

// update the product
if($applicants->update()){
    echo '{';
    echo '"message": "Applicants was updated."';
    echo '}';
}

// if unable to update the product, tell the user
else{
    echo '{';
    echo '"message": "Unable to update applicants."';
    echo '}';
}