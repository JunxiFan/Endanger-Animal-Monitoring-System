<!doctype html>
<html>
<head>
    <title>add employees</title>
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
<!---->


<div class="typrography">
    <div class="container">
        <section id="tables">
            <!--            <div class="bs-docs-example">-->
            <h3 style="text-align:center">Add an Employee</h3>
            <br>

            <form role="form" align="center" name="register" id="register" action="deals/mngaddempdeal.php"
                  method="POST">

                Username: <br> <input type="text" name="username"><br><br>
                Password: <br> <input type="text" name="password"><br><br>

                Position:<br>
                <select style="text-align:center" id="position" name="position">

                    <option value="tech">Technical Staff</option>
                    <option value="analyst">Analyst</option>
                    <option value="vet">Vet</option>
                </select>

                <br><br>
                First Name: <br> <input type="text" name="firstname"><br><br>
                Last Name: <br> <input type="text" name="lastname"><br><br>

                <input type="submit" name="submit" id="login" value="Register">
            </form>


        </section>
    </div>
</div>


<br>
<br>
<?php //include '../shared/script.php'; ?>
</body>
</html>