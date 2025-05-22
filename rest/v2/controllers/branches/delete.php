<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$branches = new Branches($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("branchesid", $_GET)) {
  // get data
  $branches->branch_aid = $_GET['branchesid'];
  checkId($branches->branch_aid);
  

  $query = checkDelete($branches);

  returnSuccess($branches, "branches", $query);
}

// return 404 error if endpoint not available
checkEndpoint();