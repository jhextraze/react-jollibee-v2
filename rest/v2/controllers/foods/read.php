<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$foods = new Category($conn);
// get $_GET data
$error = [];
$returnData = [];

if (array_key_exists("foodsid", $_GET)) {
  $foods->food_item_aid = $_GET['foodsid'];
  checkId($foods->food_item_aid);
  $query = checkReadById($foods);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($foods);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();