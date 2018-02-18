<?php
include 'dbconnect.php';
$election_id = $_REQUEST['electid'];
echo "Election ID " .$election_id;
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="add-positions.php?electionid=<?php echo $election_id?>" method="post">
       <input type="text" name="position_name" value="">
       <input type="submit" name="" value="Add Position">
     </form>

     <?php
     $getelection_positions = "SELECT * FROM election_positions WHERE election_id = $election_id";
     $result = $conn->query($getelection_positions);

     if ($result->num_rows >0) {
       # code...
       while($row = $result->fetch_assoc()) {
           echo "" . $row["position_name"]. " <a href = 'manage-candidates.php?electid=".$row['id']."'>manage Candidates</a><br>";
       }
     }

     ?>

   </body>
 </html>
