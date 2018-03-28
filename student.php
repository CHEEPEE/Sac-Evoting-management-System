<?php


include 'dbconnect.php';
session_start();

include 'functions.php';




 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>

     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- icons -->
     <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <title>Hello, world!</title>
     <style media="screen">
       body{
         margin: 0 auto;
       }
     </style>
   </head>
   <body>

     <nav class="navbar navbar-dark bg-dark">
  <!-- Navbar content -->

      <a class="navbar-brand text-white"><?php echo $_SESSION['user_name'];  ?></a>
      <form class="form-inline" action="student.php" method="post">
        <input class="form-control mr-sm-2" type="search" name="acs_code" placeholder="Input Election Access Code" aria-label="Search">
        <button class="btn btn-outline-success text-white border border-light my-2 my-sm-0" name="access-code" type="submit">Access Election</button>
      </form>

      <button type="button" class="btn btn-light"><a class="text-dark" href="logout.php">Log Out</a></button>

    </nav>

    <div class="row container-fluid center">
      <div class="col-10">

      <?php
      if (isset($_REQUEST['m'])) {
        # code...echo "string";

        if ($_REQUEST['m']=='end') {
          echo "Selected Election Has Ended";
          # code...
        }
        if ($_REQUEST['m']=='taken') {
          echo "You can only vote once";
          # code...
        }
      }


        if (isset($_POST['access-code'])) {
          # code...

          $student_id = $_SESSION['user_id'];
          if (validateAccessCode($_POST['acs_code'])) {
            # code...


            if (!validateInsertedAccessCode($student_id,$_POST['acs_code'])) {
              # code...
            $code = $_POST['acs_code'];

                $stdnAccessCodeInsertSql = "INSERT INTO registerd_student (student_id,election_access_code) VALUES ('$student_id',$code)";
                if ($conn->query($stdnAccessCodeInsertSql)) {
                  # code...

                }else {
                  # code...
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
              }else {
                echo "Access Code Already Been Inserted";
              }
            }else {
              # code...
                echo "Access Code Doesn't Exist";
            }

        }
      ?>

      </div>
    </div>
    <div class="row">

      <div class="col-12">

        <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="container mt-3">
                  <div class="row">
                    <?php
                    $student_id = $_SESSION['user_id'];
                    $evotingsql = "SELECT * FROM registerd_student where student_id ='$student_id'  ";
                    $result = $conn->query($evotingsql);

                     if ($result->num_rows > 0) {
                         // output data of each row

                         while($row = $result->fetch_assoc()) {
                           $election_access_code = $row['election_access_code'];

                           $sqlgetElectionAccessCodeDetails = "SELECT * FROM election where election_access_code = '$election_access_code'";
                           $sqlgetElectionAccessCodeDetailsResult = $conn->query($sqlgetElectionAccessCodeDetails);
                           if ($sqlgetElectionAccessCodeDetailsResult->num_rows >0) {
                             # code...
                             while ($sqlgetElectionAccessCodeDetails_rows = $sqlgetElectionAccessCodeDetailsResult->fetch_assoc()) {

                               $election_id = $sqlgetElectionAccessCodeDetails_rows['id'];
                               $eletcion_access_code = $sqlgetElectionAccessCodeDetails_rows['election_access_code'];

                                 echo "<div class='list-group-item list-group-item-action'><div class='row'><div class='col-9'> "
                                 . $sqlgetElectionAccessCodeDetails_rows["election_name"]. " " . $sqlgetElectionAccessCodeDetails_rows["date_start"]. " " . $sqlgetElectionAccessCodeDetails_rows["date_end"]. "</div><div class='col-3'>
                                 <a href = '' ></i></a><a href =
                                 'vote.php?eid=$election_id' ><i class='ml-3 icon ion-arrow-right-a'></i></a></div></div></div>";
                               # code...

                             }
                           }
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
        </div>

      </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   </body>
 </html>
