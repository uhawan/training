<?php
/**
 * Created by PhpStorm.
 * User: Akhuwat
 * Date: 11/10/2017
 * Time: 10:12 AM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include database and object file
include_once '../config/database.php';
include_once '../objects/applicants.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$applicants = new Applicants($db);

// get product id
$data = json_decode(file_get_contents("php://input"));

// set product id to be deleted
$applicants->id = $data->id;

// delete the product
if($applicants->delete()){
    echo '{';
    echo '"message": "Applicants was deleted."';
    echo '}';
}

// if unable to delete the product
else{
    echo '{';
    echo '"message": "Unable to delete object."';
    echo '}';
}