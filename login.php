<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sac eVoting#3</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <style type="text/css">
    body{
        margin: 0 auto;
      }
               .footer9{
        background-color: #292c2f;
        color: #fff;
        margin:-20px;
        padding-left: 40px;
        padding-right: 40px;
        padding-top: 40px;
        margin-top: 50vh;
      }

    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="landing.php"><img src="assets/img/Saclogo1.png" id="logo">SAC eVoting</a>
                <button class="navbar-toggle collapsed hidden" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1"></div>
        </div>
    </nav>

    <div class="form-one"><i class="fa fa-user" id="icon1"></i>
        <form class="form-horizontal custom-form" action="checklogin.php" method="post">
          <?php
            if (isset($_REQUEST['err'])) {
              # code...
              if ($_REQUEST['err'] == "error") {
                echo "Login Error";
                # code...
              }
            }
            ?>
            <h1 id="header1">User Login </h1>
            <label class="reg-label">Username: </label>
            <input required class="form-control inputbar" type="text" name = 'username' placeholder="Enter Student ID">
            <label class="reg-label">Password: </label>
            <input required class="form-control inputbar" type="password" name ="password" placeholder="Enter Password">
            <input type="submit" class="btn btn-default" id="login" value="Log in"/>
        </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</div>
 <footer class="footer9">
        <div class="row" id="row1">
            <div class="col-md-3 col-md-offset-0 col-sm-6 footer-navigation" id="col1">
                <h3 id="foot-head1"> St. Anthony's College</h3>
                <p class="company-name">Copyright © 2017 </p>
            </div>
            <div class="col-md-3 footer-contacts">
                <div id="sec1"><i class="fa fa-phone footer-contacts-icon"></i>
                    <p id="par2" class="ficon ion-ios-telephone-outline"> (036) 540-9238</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 footer-contacts">
                <div id="sec3"><i class=""></i>
                    <p id="par3" class="icon ion-ios-telephone-outline"> (036) 540-9971; 540-9196 </p>
                </div>
            </div>
            <div class="col-md-3 footer-contacts">
                <div id="sec2"><span class=""> </span>
                    <p id="par1"><span class="new-line-span ion-ios-location"> San Jose de Buenavista</span> Antique, Philippines</p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
        </div>
    </footer>
</body>

</html>

