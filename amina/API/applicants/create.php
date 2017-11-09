<?php
/**
 * Created by PhpStorm.
 * User: Akhuwat
 * Date: 11/9/2017
 * Time: 3:37 PM
 */
print_r($_POST);
print_r($_REQUEST);
print_r($_GET);
die("we die here");
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

$data = json_decode(file_get_contents("http://localhost/API/addData.html"));
print_r($data);
die();
// set product property values
$applicants->name = $data->name;
