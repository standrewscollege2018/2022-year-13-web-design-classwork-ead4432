<?php

$tutor_sql = "SELECT * FROM tutorgroup";
$tutor_qry = mysqli_query($dbconnect, $tutor_sql);
$tutor_aa = mysqli_fetch_assoc($tutor_qry);

 ?>
 <!-- where to change bg  -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
   <div class="container-fluid">
     <img src="images/logo.png" alt="Stac Logo">
     <!-- burger menu -->
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <!-- means burger menu is display under a curtain size -->
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item dropdown rounded">
           <!-- dropdown button -->
           <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tutors</a>
           <!-- dropdown content -->
           <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown" data-mdb-animation-reset="true">
             <?php
             do {
               // gets the tutor id and tutor code from db
               $tutorgroupID = $tutor_aa['tutorgroupID'];
               $tutorcode = $tutor_aa['tutorcode'];
               echo "<li><a class='dropdown-item' href='index.php?page=tutorgroup&tutorgroupID=$tutorgroupID&tutorcode=$tutorcode'>$tutorcode</a></li>";
              } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry))
              ?>
           </ul>
         </li>
       </ul>
        <!-- search bar, links to searchresults page that then links back to index -->
        <!-- searchs results here sets page get array so it links to the php page -->
       <form class="d-flex flex-column" action="index.php?page=searchresults" method="post">
         <div class="col-12">
           <div class="input-group">
             <input required class="form-control rounded" type="text" name="search" placeholder="Student name">
             <button type="submit" name="button" class="btn btn-outline-secondary text-light">Search</button>
           </div>
         </div>
       </form>
     </div>
   </div>
 </nav>
