<?php
session_start();

include 'dbconnect.php';
$delimiters = array("(", ")");

if (!isset($_GET["studentID"]) or $_GET["studentID"]==""){
  echo "No students searched</h1>";
} elseif ($_GET["studentID"] == "clear") {
  unset($_SESSION["selectedstudents"]);
  echo "No Students Selected";
}else {
  $newname = str_replace($delimiters, "", $_GET["studentID"]);
  $tempID = explode(" ", $newname);
  $studentID = $tempID[0];
  if (!isset($_SESSION['selectedstudents'])) {
    $_SESSION['selectedstudents'] = array();
    array_push($_SESSION['selectedstudents'], $studentID);
  } else {
    array_push($_SESSION['selectedstudents'], $studentID);
  }
  foreach ($_SESSION['selectedstudents'] as $student) {
    $session_stmt = $dbconnect->prepare("SELECT st.studentID ,st.firstname, st.lastname, y.yeargroupname FROM student AS st INNER JOIN yeargroup AS y ON st.yeargroupID = y.yeargroupID WHERE studentID='$student'");
    $session_stmt->execute();
    $session_result = $session_stmt->get_result();

    if($session_result->num_rows==0) {
      echo "<h1>No student found</h1>";
    } else {
    $session_data = $session_result->fetch_assoc();
    $studentID = $session_data['studentID'];
    $firstname = $session_data['firstname'];
    $lastname = $session_data['lastname'];
    $year = $session_data['yeargroupname'];
    echo "<tr>
            <th scope='row' class='pt-0 pb-0'><input class='form-check-input display-7 m-0' type='checkbox' name='student[]' value='$studentID' id='flexCheckChecked' checked></th>
            <td scope='col' >$firstname $lastname</td>
            <td scope='col' class='text-center'>$year</td>
          </tr>";
    }
  }
}
