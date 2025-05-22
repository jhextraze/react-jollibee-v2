<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$branches = new Branches($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$branches->branch_is_active = 1;
// $branches->branch_image = checkIndex($data, "branch_image");
$branches->branch_name = checkIndex($data, "branch_name");
$branches->branch_created = date("Y-m-d H:i:s");
$branches->branch_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
// isNameExist($category, $category->category_title);

$query = checkCreate($branches);

returnSuccess($branches, "branches", $query);
