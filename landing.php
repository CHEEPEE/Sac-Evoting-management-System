<?php
     include 'dbconnect.php';
    
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
    <style type="text/css">
        
        
        #welcome{
            height: 80vh;
        }
    </style>
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
                   
                </ul><a class="btn btn-default navbar-btn navbar-right" role="button" href="login.php" id="btnA">Login</a></div>
        </div>
    </nav>
    <div id="welcome">
        <div class="jumbotron">
            <h1>Welcome!</h1>
            <h2>SAC Electronic Voting</h2>
            <p>
               <a href = "login.php"> <button class="btn btn-default" type="submit">Log In</button></a>
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