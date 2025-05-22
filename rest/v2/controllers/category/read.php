<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$foodcategory = new Category($conn);
// get $_GET data
$error = [];
$returnData = [];

if (array_key_exists("foodcategoryid", $_GET)) {
  $foodcategory->food_category_aid = $_GET['foodcategoryid'];
  checkId($foodcategory->food_category_aid);
  $query = checkReadById($foodcategory);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($foodcategory);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();