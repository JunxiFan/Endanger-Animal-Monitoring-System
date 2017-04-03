<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: fjx19-->
<!-- * Date: 2017/3/29-->
<!-- * Time: 12:02-->
<!-- */-->
<!doctype html>
<html>
<head>

    <title>Analyst</title>
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
    <link rel="stylesheet" type="text/css" href="css/default.css"/>
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

                    <?php
                    session_start();
                    echo "<li><a href=\"#\"><span class=\"glyphicon glyphicon-user\">Welcome, {$_SESSION['username']}!</span></a></li>";
                    ?>
                    <!--                    <li><span class=\"glyphicon glyphicon-user\"></span> {$_SESSION['username']}</li>-->
                    <div class="login-pop">
                        <div id="loginpop"><a href="deals/logout.php"><span>Logout</span></a></div>
                    </div>
                </ul>

                <div class="clearfix"></div>
            </div><!-- /.navbar-collapse -->
            <!-- /.container-fluid -->
            <!--            echo "<li><a href=\"../views/logout.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Log out</a></li>";-->
            <!--            <a href="gallery.php" id="loginButton">dfdf</a>-->
            <script src="js/menu_jquery.js"></script>
        </div>
    </nav>
    <!--/script-->
    <div class="clearfix"></div>
</div>
<div class="banner banner5">
    <div class="container">
        <h2>Manager Page</h2>
    </div>
</div>


<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
        <li><a href="#addAnimal">Add an Animal</a></li>
        <li><a href="#deleteAnimal">Delete an Animal</a></li>
        <li><a href="#volDonations">Check Volunteer Donations</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Section 4 <span
                        class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#section41">Section 4-1</a></li>
                <li><a href="#section42">Section 4-2</a></li>
            </ul>
        </li>
    </ul>
</div>

<div id="addAnimal" class="container-fluid">
    <h3 align="center">Add an animal</h3>
    <form action="/example.php" align="center">

        Animal ID: <br> <input type="text" name="animalID"><br><br>
        Name: <br> <input type="text" name="name"><br><br>
        Population: <br> <input type="text" name="population"><br><br>
        Minimum Weight: <br> <input type="text" name="minWeight"><br><br>
        Maximum Weight: <br> <input type="text" name="maxWeight"><br><br>
        Minimum Length: <br> <input type="text" name="minLength"><br><br>
        Maximum Length: <br> <input type="text" name="maxLength"><br><br>
        Risk: <br> <input type="text" name="risk"><br><br>
        Minimum Temperature: <br> <input type="text" name="minTemp"><br><br>
        Maximum Temperature: <br> <input type="text" name="maxTemp"><br><br>
        Minimum Respiration: <br> <input type="text" name="minResp"><br><br>
        Maximum Respiration: <br> <input type="text" name="maxResp"><br><br>
        Minimum Heartbeat: <br> <input type="text" name="minHeart"><br><br>
        Maximum Heartbeat: <br> <input type="text" name="maxHeart"><br><br>
        Minimum Temperature: <br> <input type="text" name="minTemp"><br><br>
        Maximum Temperature: <br> <input type="text" name="maxTemp"><br><br>
        Minimum Blood Pressure: <br> <input type="text" name="minBP"><br><br>
        Maximum Blood Pressure: <br> <input type="text" name="maxBP"><br><br>
        Running Speed: <br> <input type="text" name="runningSpeed"><br><br>
        <input type="submit" value="Submit">
    </form>
</div>


<div id="deleteAnimal" class="container-fluid">
    <h3 align="center">Delete an animal</h3>
    <form action="/example.php" align="center">
        Animal ID: <br> <input type="text" name="animalID"><br><br>
        Name: <br> <input type="text" name="name"><br><br>
        <input type="submit" value="Submit">
</div>

<div id="volDonations" class="container-fluid">
    <h3 align="center">Volunteer Donations</h3>
    <form action="/example.php" align="center">
        <input type="submit" value="Click to see Donations" align="center">
    </form>
</div>

</body>
</html>