<?php
     include 'dbconnect.php';
    // include 'bootstrap.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAC eVoting</title>
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
                <a class="navbar-brand navbar-link" target="_blank"><img src="assets/img/Saclogo1.png" id="logo">SAC eVoting</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="landing3.html">Elementary </a></li>
                    <li role="presentation"><a href="landing2.html"> High School</a></li>
                    <li class="active" role="presentation"><a href="landing.html">College </a></li>
                </ul><a class="btn btn-default navbar-btn navbar-right" role="button" href="login.html" id="btnA">Login</a><a class="btn btn-default navbar-btn navbar-right" role="button" href="Registration.html">Register ID</a></div>
        </div>
    </nav>
    <div id="welcome">
        <div class="jumbotron">
            <h1>Notice! </h1>
            <p>The election will start at 9 AM.</p>
            <p>
                <button class="btn btn-default" type="submit">Learn more</button>
            </p>
            <div class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Modal Title</h4></div>
                        <div class="modal-body">
                            <p>The content of your modal.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="button">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="candidates-section">
        <div class="container site-sections" id="intro">
            <h1>Leading College Candidates</h1>
            <div class="row" id="lead">
                <div class="col-md-4 lead">
                    <h3>President </h3>

             <?php
                    $election_id;
        $getLatestElection ="SELECT * FROM election ORDER BY id DESC LIMIT 1";
            $getLatestElectionResult =$conn->query($getLatestElection);
                if ($getLatestElectionResult->num_rows>0) {
                    while ($rowElection = $getLatestElectionResult->fetch_assoc()){
                        $election_id = $rowElection['id'];

                    }
                }

        $getCandidatessql = "SELECT * FROM candidates WHERE election_id=$election_id";
         $getCandidateResult =$conn->query($getCandidatessql);
         if ($getCandidateResult->num_rows>0) {
           while ($rowcandidate = $getCandidateResult->fetch_assoc()) {
             # code...
             echo $rowcandidate['candidate_name']."<br>";
           }
           # code...
         }
                    ?>
                </div>
                <div class="col-md-4 lead">
                    <h3>Vice President</h3>
                    <p>1. Paragraph</p>
                    <p>2. Paragraph</p>
                    <p>3. Paragraph</p>
                    <p>4. Paragraph</p>
                    <p>5. Paragraph</p>
                </div>
                <div class="col-md-4 lead">
                    <h3>Governor </h3>
                    <p>1. Paragraph</p>
                    <p>2. Paragraph</p>
                    <p>3. Paragraph</p>
                    <p>4. Paragraph</p>
                    <p>5. Paragraph</p>
                </div>
                <div class="col-md-4 lead">
                    <h3>Vice-Governor </h3>
                    <p>1. Paragraph</p>
                    <p>2. Paragraph</p>
                    <p>3. Paragraph</p>
                    <p>4. Paragraph</p>
                    <p>5. Paragraph</p>
                </div>
                <div class="col-md-4 lead">
                    <h3>Representative </h3>
                    <p>1. Paragraph</p>
                    <p>2. Paragraph</p>
                    <p>3. Paragraph</p>
                    <p>4. Paragraph</p>
                    <p>5. Paragraph</p>
                </div>
                <div class="col-md-4 lead">
                    <h3>Mayor </h3>
                    <p>1. Paragraph</p>
                    <p>2. Paragraph</p>
                    <p>3. Paragraph</p>
                    <p>4. Paragraph</p>
                    <p>5. Paragraph</p>
                </div>
                <div class="col-md-12 lead">
                    <h3>Vice Mayor </h3>
                    <p>1. Paragraph</p>
                    <p>2. Paragraph</p>
                    <p>3. Paragraph</p>
                    <p>4. Paragraph</p>
                    <p>5. Paragraph</p>
                </div>
            </div>
        </div>
        <div class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Modal Title</h4></div>
                    <div class="modal-body">
                        <p>The content of your modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="button">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer9">
        <div class="row" id="row1">
            <div class="col-md-3 col-md-offset-0 col-sm-6 footer-navigation" id="col1">
                <h3 id="foot-head1"> St. Anthony's College</h3>
                <p class="company-name">Copyright © 2017 </p>
            </div>
            <div class="col-md-3 footer-contacts">
                <div id="sec1"><i class="fa fa-phone footer-contacts-icon"></i>
                    <p id="par2" class="footer-center-info email"> (036) 540-9238</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 footer-contacts">
                <div id="sec3"><i class="fa fa-fax footer-contacts-icon"></i>
                    <p id="par3">(036) 540-9971; 540-9196 </p>
                </div>
            </div>
            <div class="col-md-3 footer-contacts">
                <div id="sec2"><span class="fa fa-map-marker footer-contacts-icon"> </span>
                    <p id="par1"><span class="new-line-span">San Jose de Buenavista</span> Antique, Philippines</p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
