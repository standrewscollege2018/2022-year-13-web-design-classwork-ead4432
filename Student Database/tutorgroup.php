<?php
// is set through the dropdown

if(!isset($_GET['tutorgroupID'])) {
  header("Location: index.php");
} else {
  $tutorcode = $_GET['tutorcode'];
  $tutorgroupID = $_GET['tutorgroupID'];
  $tutor_sql = "SELECT * FROM student WHERE tutorgroupID=$tutorgroupID";
  $tutor_qry = mysqli_query($dbconnect, $tutor_sql);

  if(mysqli_num_rows($tutor_qry)==0) {
    echo "<p class='text-center display-4'>No students in $tutorcode</p>";
  } else {
    $tutor_aa = mysqli_fetch_assoc($tutor_qry);
    echo "<h1 class='text-center display-4'>Students in $tutorcode:</h1>";
    ?>
    <div class="container-fluid">
      <div class="row g-3">
            <?php
        do {
          $firstname = $tutor_aa['firstname'];
          $lastname = $tutor_aa['lastname'];
          $photo = $tutor_aa['photo'];
          ?>
          <!-- outside col gives it it's sizing inside is just cause it needs to be -->
          <div class="col-12 col-md-6 col-xl-3">
            <div class="col p-3 bg-light-blue card border rounded">
              <?php
              echo "<img src='images/$photo'>";
              echo "<div class='card-body p-0'><p class='mb-0 text-center'>$firstname $lastname</p></div>";
               ?>
            </div>
          </div>
          <?php
        } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));
        ?>
      </div>
    </div>
  <?php
  }
}
?>
