<?php
/**
 * Created by PhpStorm.
 * User: Akhuwat
 * Date: 11/10/2017
 * Time: 11:39 AM
 */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/applicants.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$applicants = new Applicants($db);

// set ID property of product to be edited
$applicants->id = isset($_GET['id']) ? $_GET['id'] : '';

// read the details of product to be edited
$applicants->readOne();

// create array
$product_arr = array(
    "id" =>  $applicants->id,
    "name" => $applicants->name,
    "father_name" => $applicants->father_name,
    "cnic" => $applicants->cnic,
    "address" => $applicants->address,
    "gender" => $applicants->gender,
    "province" => $applicants->province,
    "country" => $applicants->country,
    "districts" => $applicants->districts
);

// make it json format
print_r(json_encode($product_arr));