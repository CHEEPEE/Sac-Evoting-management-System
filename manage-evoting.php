<?php
include 'dbconnect.php';

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <form class="" action="insert-election.php" method="post">
       <div class="form-2">
             <label for="election_name">Election Name</label>
             <input type="text" name="election_name" class="form-control" id="election_name" aria-describedby="emailHelp" placeholder="Election Name">
       </div>
       <div class="form-2">
           <label for="election-type"  class="elec-label">Start Date:</label>
           <input class="input-sm" name="start_date" type="date">
       </div>
       <div class="form-2">
           <label for="election-type" class="elec-label" >End Date:</label>
           <input class="input-sm" name ="end_date" type="date">
       </div>
       <input type="submit" class="btn btn-default" value="Next">
     </form>
     <!-- Election Name -->
     <?php
     $evotingsql = "SELECT * FROM election ORDER BY id DESC";
     $result = $conn->query($evotingsql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "" . $row["election_name"]. " - Name: " . $row["date_start"]. " " . $row["date_end"]. " <a href='manage-election.php?electionid=".$row['id']."'>Edit Election </a><br>";
              $election_id = $row['id'];
              ?>


              <?php
          }
      } else {
          echo "0 results";
      }
     ?>

   </body>
 </html>
