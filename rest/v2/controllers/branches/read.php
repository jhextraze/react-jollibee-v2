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
  $branches->branch_aid = $_GET['branchesid'];
  checkId($branches->branch_aid);
  $query = checkReadById($branches);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($branches);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();