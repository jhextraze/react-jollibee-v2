<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$foodcategory = new Category($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$foodcategory->food_category_is_active = 1;
// $foodcategory->food_category_image = checkIndex($data, "food_category_image");
$foodcategory->food_category_name = checkIndex($data, "food_category_name");
$foodcategory->food_category_created = date("Y-m-d H:i:s");
$foodcategory->food_category_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
// isNameExist($category, $category->category_title);

$query = checkCreate($foodcategory);

returnSuccess($foodcategory, "category", $query);
