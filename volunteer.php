<!doctype html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Education Tutorial Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--bootstrap-->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!--coustom css-->
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <!--script-->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- js -->
    <script src="js/bootstrap.js"></script>
    <!-- /js -->
    <!--fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400italic,400,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <!--/fonts-->
    <!--hover-girds-->
    <!--    <link rel="stylesheet" type="text/css" href="css/default.css"/>-->
    <link rel="stylesheet" type="text/css" href="css/component.css"/>
    <script src="js/modernizr.custom.js"></script>
    <!--/hover-grids-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <!--script-->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
            });
        });
    </script>
    <!--/script-->
</head>
<body>
<!--header-->
<div class="header" id="home">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"> </span>
                    <span class="icon-bar"> </span>
                    <span class="icon-bar"> </span>
                </button>
                <h1><a class="navbar-brand" href="index.php">Aqua<br/><span>Endanger Animals monitoring</span></a></h1>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right margin-top cl-effect-2">
                    <li><a href="index.php"><span data-hover="Home">Home</span></a></li>
                    <li><a href="donor.php"><span data-hover="Donor">Donor</span></a></li>
                    <li><a href="volunteer.php"><span data-hover="Volunteer">Volunteer</span></a></li>
                    <li><a href="about.php"><span data-hover="About">About</span></a></li>
                    <li><a href="contact.php"><span data-hover="Contact">Contact</span></a></li>
                </ul>
                <div class="clearfix"></div>
            </div><!-- /.navbar-collapse -->
            <!-- /.container-fluid -->
            <div class="login-pop">
                <div id="loginpop"><a href="#" id="loginButton"><span>Login</span></a>
                    <div id="loginBox">
                        <form role="form" id="loginForm" action="deals/logincheck.php" method="post">
                            <fieldset id="body">
                                <fieldset>
                                    <label for="email">Username</label>
                                    <input type="text" id="username" name="username">
                                </fieldset>
                                <fieldset>
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password">
                                </fieldset>
                                <input type="submit" name="submit" id="login" value="Log in">
                                <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                            </fieldset>
                            <span><a href="#">Forgot your password?</a></span>
                        </form>
                    </div>
                </div>
            </div>
            <script src="js/menu_jquery.js"></script>
        </div>
    </nav>
    <!--/script-->
    <div class="clearfix"></div>
</div>
<!-- Top Navigation -->



<div class="typrography">
    <div class="container">
        <section id="tables">
            <!--            <div class="bs-docs-example">-->
            <h3 style="text-align:center">Thank you for your help!</h3>
            <br>

            <form role="form" align="center" name="register" id="register" action="deals/volunteerdeal.php"
                  method="POST">

                First Name: <br> <input type="text" name="firstname"><br><br>
                Last Name: <br> <input type="text" name="lastname"><br><br>
                Address: <br> <input type="text" name="address"><br><br>
                Phone Number: <br> <input type="text" name="phone"><br><br>
                Resume: <br> <input type="text" name="resume"><br><br>
                E-mail: <br> <input type="text" name="email"><br><br>
                <!--                Last Name: <br> <input type="text" name="lastname"><br><br>-->

                <input type="submit" name="submit" id="login" value="Submit">
            </form>


        </section>
    </div>
</div>

</body>
</html>
