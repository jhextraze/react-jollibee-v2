<?php
// set http header
require '../../core/header.php';
// use needed functions
require '../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../models/foods/Foods.php';
// get payload

// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$foods = new Category($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// get $_GET data
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
  //checkApiKey();
  if (array_key_exists("foodsid", $_GET)) {
    // check data
    checkPayload($data);
    $foods->food_item_aid = $_GET['foodsid'];
    $foods->food_item_is_active = trim($data["isActive"]);
    checkId($foods->food_item_aid);
    $query = checkActive($foods);
    http_response_code(200);
    returnSuccess($foods, "foods", $query);
  }
  // return 404 error if endpoint not available
  checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();
