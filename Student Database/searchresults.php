<?php
// is include from the search in navbar.php by the oage thing

// makes sure search results are set
  if(!isset($_POST['search'])) {
    header("Location: index.php");
  }
  $search = $_POST['search'];

  // GETS all the results that match the search
  $result_sql = "SELECT * FROM student WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";

  $result_qry = mysqli_query($dbconnect, $result_sql);

// error checks if no results
  if(mysqli_num_rows($result_qry)==0) {
      echo "<h1 class='text-center display-4'>No results found</h1>";
    } else {
      $result_aa = mysqli_fetch_assoc($result_qry);
      echo "<h1 class='text-center display-4'>Results:</h1>";

      ?>
      <div class="container-fluid">
        <div class="row g-3">
              <?php
          do {
            // displays name and photo
            $firstname = $result_aa['firstname'];
            $lastname = $result_aa['lastname'];
            $photo = $result_aa['photo'];

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
            } while ($result_aa = mysqli_fetch_assoc($result_qry));
            ?>
        </div>
      </div>
        <?php
  }
 ?>
