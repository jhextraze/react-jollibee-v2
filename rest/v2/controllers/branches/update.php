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
  // check data
  checkPayload($data);
  // get data
  $branches->branch_aid = $_GET['branchesid'];
  // $branches->branch_image = checkIndex($data, "branch_image");
  $branches->branch_name = checkIndex($data, "branch_name");
  $branches->branch_created = date("Y-m-d H:i:s");
  $branches->branch_datetime = date("Y-m-d H:i:s");
  checkId($branches->branch_aid);

// //checks current data to avoid same entries from being updated
// $role_name_old = checkIndex($data, 'role_name_old');
// compareName($role, $role_name_old, $role->role_name);
// checkId($role->role_aid);
  if (!$branches->branch_name) {
  response(400, "Missing branch_name");
  exit;
}
  // update
  $query = checkUpdate($branches);
  returnSuccess($branches, "branches", $query);
}

// return 404 error if endpoint not available
checkEndpoint();