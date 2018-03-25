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

      <button type="button" class="btn btn-light"><a class="text-dark" href="#">Log Out</a></button>

    </nav>
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-3">

          <div id="list-example" class="list-group position-fixed">

          <?php
          if (isset($_REQUEST['eid'])) {
            # code..
            $eid = $_REQUEST['eid'];
            if (getElectionStatus($eid)=="false") {
              # code...
              header("location:student.php?m=end");
            }
            $student_id = $_SESSION['user_id'];
            if (getVoteStatus($eid,$student_id)=='true') {
              # code...
              header("location:student.php?m=taken");
            }



            $eid=$_REQUEST['eid'];
            $electionSql = "SELECT * from election_positions where election_id = $eid";
            $electionSqlResult = $conn->query($electionSql);
            if ($electionSqlResult->num_rows>0) {
              # code...
              while ($row = $electionSqlResult->fetch_assoc()) {
                # code...
                $posId = $row['id'];
                $posistionName =$row['position_name'];
              ?>
                  <a class="list-group-item list-group-item-action" href="#list-item-<?php echo $posId; ?>"><?php echo $posistionName; ?></a>

                  <?php
                }
            }
          }
          ?>
          </div>
        </div>
        <div class="col-5">
          <?php $eid=$_REQUEST['eid'];  ?>
          <form class="" action="submitvote.php?eid=<?php echo $eid; ?>" method="post">

          <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">


            <?php
            if (isset($_REQUEST['eid'])) {
              # code..
              $eid=$_REQUEST['eid'];
              $electionSql = "SELECT * from election_positions where election_id = $eid";
              $electionSqlResult = $conn->query($electionSql);
              if ($electionSqlResult->num_rows>0) {
                # code...
                while ($row = $electionSqlResult->fetch_assoc()) {
                  # code...
                  $posId = $row['id'];
                  $posistionName =$row['position_name'];
                ?>

                    <h4 id="list-item-<?php echo $posId; ?>"><?php echo $posistionName; ?></h4>
                    <p>
                      <?php
                      $candidatSql = "SELECT * from candidates where position_id = $posId";
                      $candiateSqlResult = $conn->query($candidatSql);
                      if ($electionSqlResult->num_rows>0) {
                        # code...
                        while ($candiateSqlResultrow = $candiateSqlResult->fetch_assoc()) {
                          # code...
                            $img = $candiateSqlResultrow['img_location'];
                            $des = $candiateSqlResultrow['candidate_des'];

                        ?>

                        <div class="input-group mt-3" data-toggle="tooltip" data-placement="right" title="<?php echo $des; ?>">
                          <div class="input-group-prepend" >
                            <image class='mr-3' src = '<?php echo $img; ?>' width='100px' height = '100px'>
                            <div class="input-group-text">

                            <input type="radio" name="<?php echo $posId ?>" aria-label="Radio button for following text input" value="<?php   echo $candiateSqlResultrow['candidate_id']; ?>">
                            </div>
                          </div>

                          <input type="text" class="form-control" value="<?php   echo $candiateSqlResultrow['candidate_fname']." ".$candiateSqlResultrow['candidate_mname']." ". $candiateSqlResultrow['candidate_lname'] ; ?>" aria-label="Text input with radio button">
                        </div>
                            <?php
                          }
                      }
                      ?>
                    </p>

                    <?php
                  }
              }
            }
            ?>
          </div>
          <input class="btn btn-primary" type="submit" name="submit-vote" value="Submit Vote">
        </form>
        </div>

      </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
  </body>

  <html>
