<?php
include 'dbconnect.php';
include 'bootstrap.php';
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="jumbotron">
       <div class="row justify-content-md-center">
         <div class="col-6">


       <form class="" action="insert-election.php" method="post">
         <div class="form-2">
               <label for="election_name">Election Name</label>
               <input type="text" required name="election_name" class="form-control" id="election_name" aria-describedby="emailHelp" placeholder="Election Name">
         </div>
         <div class="form-2">
             <label for="election-type"  class="elec-label">Start Date:</label>
             <input class="input-sm" required name="start_date" type="date">
         </div>
         <div class="form-2">
             <label for="election-type" class="elec-label" >End Date:</label>
             <input class="input-sm" required name ="end_date" type="date">
         </div>
         <input type="submit" class="btn btn-default" value="Next">
       </form>
     </div>
   </div>
       <div class="row justify-content-md-center">
         <div class="col-6">


       <div class="list-group">
       <!-- Election Name -->
       <?php
       $evotingsql = "SELECT * FROM election ORDER BY id DESC";
       $result = $conn->query($evotingsql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='list-group-item list-group-item-action'><div class='row'><div class='col-10'> ". $row["election_name"]. " " . $row["date_start"]. " " . $row["date_end"]. "</div><div class='col-2'><a href = 'manage-election.php?electionid=".$row['id']."' ><i class='large material-icons'>settings</i></a><a href = 'manage-election.php?electionid=".$row['id']."' ><i class='large material-icons'>delete</i></a></div></div></div>";
                $election_id = $row['id'];
                ?>
                <?php
            }
        } else {
            echo "0 results";
        }
       ?>
           </div>
         </div>
       </div>
     </div>
   </body>
 </html>
