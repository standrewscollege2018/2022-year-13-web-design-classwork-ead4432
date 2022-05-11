<?php
// includes DBConnect code so site can connect to database
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Yes</title>
    <!-- CSS goes up here for bootrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="custom.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript">
    // This function takes the studentID entered and gets their details
    // The studentdetails.php page is then updated
    function selectstudent(studentID) {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("studenttable").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","studentdetails.php?studentID="+studentID,true);
    xmlhttp.send();
    }
    </script>
    </script>
    <script type="text/javascript">
      $(function() {$( "#term" ).autocomplete({source: 'autocomplete.php',});});
    </script>
  </head>
  <body>
      <div class="container-fluid pt-5">
        <div class="input-group">
          <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" name="button" class="btn btn-primary w-100 btn-outline-secondary text-dark">Modal</button>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content border-0">
              <div class="modal-header bg-red text-light">
                <h5 class="modal-title" id="exampleModalLabel">Add Care Cards: </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body ui-front">
                <form onsubmit="selectstudent(searchinput.value);return false">
                  <div class="input-group input-group-lg mb-3">
                    <input type="text" id="term" name="searchinput" value="" class="form-control input-lg placeholder-white border-0 bg-input-red"  placeholder="Search All" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <button class="btn btn-outline-none text-light bg-red" type="submit" id="button-addon1"><i class="bi bi-search"></i></button>
                  </div>
                </form>
                  <form action="insertcard.php" method="post">
                  <h4 class="mb-0">Selected Students:</h4>
                  <div class="dropdown-divider bg-dark mb-0"></div>
                  <div class="mb-3">
                    <table class="table table-striped table-hover align-middle">
                      <!-- thead is always aligned bottom -->
                      <thead>
                        <tr>
                          <th scope="col" class="w-overide-0"></th>
                          <th scope="col">Student Name:</th>
                          <th scope="col" class="text-center">Year:</th>
                        </tr>
                      </thead>
                      <!-- tbody is always aligned top -->
                      <tbody id="studenttable">
                      </tbody>
                    </table>
                  </div>
                  <div class="dropdown-divider bg-dark mb-3"></div>
                  <div class="mb-3">
                    <button class="btn btn-outline-none text-light bg-red btn-lg w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <div class="row"><div class="col">Add Comment</div><div class="col text-end"><i class="bi bi-chevron-expand"></i></div></div></button>
                    <ul class="dropdown-menu dropdown-menu-red" aria-labelledby="CommentDropDown">
                      <li><a class="dropdown-item" href="#">Completed your homework</a></li>
                      <li><a class="dropdown-item" href="#">Showed good behaviour</a></li>
                      <!-- <li><hr class="dropdown-divider"></li> -->
                      <li><a class="dropdown-item" href="#">Other</a></li>
                    </ul>
                  </div>
                  <div class="dropdown-divider bg-dark"></div>
                  <div class="row mb-3">
                    <div class="col me-auto">
                      <!-- Means when you click on text in label it brings you to tied item with the same id in the for="" -->
                      <label for="numberinput" class="form-label display-8">Amount:</label>
                    </div>
                    <div class="col">
                      <!-- Id is same as labels for therefore the label links to the input -->
                      <!-- aria-describedby is for page readers -->
                      <!-- ID can be whatever, they dont seem to have give it styling -->
                      <input placeholder="Enter a number" name="" required value="" min="1" max="3" type="number" id="Inputhelp"/>
                    </div>
                  </div>
                <div class="row justify-content-between">
                  <div class="col-auto">
                    <button type="submit" class="btn bg-red text-light">Submit</button>
                    </form>
                  </div>
                  <div class="col-auto">
                    <!-- <form onsubmit="();return false"> -->
                      <button onclick="selectstudent(this.value)" value="clear" type="button" class="btn btn-secondary text-light">Clear</button>
                    <!-- </form> -->
                  </div>
                </div>

              </div>
              <div class="modal-footer bg-red">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- use data-bs-dismiss to close it -->
              </div>
            </div>
          </div>
        </div>

      </div>

    <!-- javascript down here -->
    <script src="bootstrap-input-spinner.js"></script>
    <script>
        $("input[type='number']").inputSpinner()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
