<?php
     include 'dbconnect.php';
     include 'bootstrap.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sac eVoting</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="landing.html"><img src="assets/img/Saclogo1.png" id="logo">SAC eVoting</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Account </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="Landing.html">Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="content" class="form-1">
        <div class="container-fluid" id="candidates">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal custom-form">
                        <h1>Manage Election</h1></form>
                </div>
            </div>
        </div>
    </div>
    <div id="welcome1">
        <div class="jumbotron">
            <form action="insert-election.php" method="post">
            <div>
                <label for="election_name">Election Name: </label>
                <input type="text" required name="election_name" class="form-control" id="election_name" aria-describedby="emailHelp" placeholder="Election Name">
            </div>
            <div>
                <label>Start Date: </label>
                <input type="date" required name="start_date">
            </div>
            <div>
                <label>End Date: </label>
                <input type="date" required name="end_date">
            </div>
            <button class="btn btn-default btn-sm" type="submit" >Button</button>
            </form>
               <div class="list-group">
       <!-- Election Name -->
       <?php
       $evotingsql = "SELECT * FROM election ORDER BY id DESC";
       $result = $conn->query($evotingsql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='list-group-item list-group-item-action'><div class='row'><div class='col-10'> ". $row["election_name"]. " " . $row["date_start"]. " " . $row["date_end"]. "</div><div class='col-2'><a href = 'manage-election.php?electionid=".$row['id']."' ><i class='large material-icons'>settings</i></a><a href = 'delete-evoting.php?electionid=".$row['id']."' ><i class='large material-icons'>delete</i></a></div></div></div>";
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
