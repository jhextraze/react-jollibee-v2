<?php
// set http header
require '../../core/header.php';
// use needed functions
require '../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../models/category/Category.php';
// get payload

// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$foodcategory = new Category($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// get $_GET data
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
  //checkApiKey();
  if (array_key_exists("foodcategoryid", $_GET)) {
    // check data
    checkPayload($data);
    $foodcategory->food_category_aid = $_GET['foodcategoryid'];
    $foodcategory->food_category_is_active = trim($data["isActive"]);
    checkId($foodcategory->food_category_aid);
    $query = checkActive($foodcategory);
    http_response_code(200);
    returnSuccess($foodcategory, "category", $query);
  }
  // return 404 error if endpoint not available
  checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();
