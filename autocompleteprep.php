<?php
require_once "dbconnect.php";
$res = array();
if (isset($_GET['term'])) {
  $name = $_GET['term'];
  $names = explode(" ", $name);
  $query = "SELECT studentID, firstname, lastname FROM student WHERE (firstname LIKE '%$names[0]%' OR lastname LIKE '%$names[0]%')"
  if (count($names) >1) {
    foreach ($names as $value) {
        $query = $query." AND (firstname LIKE '%$value%' OR lastname LIKE '%$value%') ";
      }
  }
  $query = $query." Limit 5";
  $query_stmt = $dbconnect->prepare($query);
  $query_stmt->execute();
  $query_result = $query_stmt->get_result();
  $query_data = $query_result->fetch_all(MYSQLI_ASSOC);

  if ($query_result->num_rows) {
    foreach ($query_data as $user) {

      $name = "(".$user['studentID'].") ".$user['firstname']." ".$user['lastname'];
      $studentID = $user['studentID'];
      array_push($res, $name);
    }
  } else {
    $res = array();
  }
  //return json res
  echo json_encode($res);
}
?>
