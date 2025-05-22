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
  // check data
  checkPayload($data);
  // get data
  $foodcategory->food_category_aid = $_GET['foodcategoryid'];
  // $foodcategory->food_category_image = checkIndex($data, "food_category_image");
  $foodcategory->food_category_name = checkIndex($data, "food_category_name");
  $foodcategory->food_category_created = date("Y-m-d H:i:s");
  $foodcategory->food_category_datetime = date("Y-m-d H:i:s");
  checkId($foodcategory->food_category_aid);

// //checks current data to avoid same entries from being updated
// $role_name_old = checkIndex($data, 'role_name_old');
// compareName($role, $role_name_old, $role->role_name);
// checkId($role->role_aid);

  // update
  $query = checkUpdate($foodcategory);
  returnSuccess($foodcategory, "category", $query);
}

// return 404 error if endpoint not available
checkEndpoint();