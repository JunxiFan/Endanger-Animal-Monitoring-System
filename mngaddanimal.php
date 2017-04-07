<!doctype html>
<html>
<head>
    <title>manage add aniamals</title>
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

<?php
$DB_HOST = 'localhost';
$DB_PORT = '3306';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'aqua';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

$sql_install = "select TypeID, name from standard";//将选中的动物信息插入collar表中
$result = $mysqli->query($sql_install);
$count_rows = mysqli_num_rows($result);
?>

<div class="typrography">
    <div class="container">
        <section id="tables">
            <!--            <div class="bs-docs-example">-->
            <h3 style="text-align:center">Add Animals to monitor</h3>
            <br><br>

            <form role="form" align="center" name="register" id="register" action="deals/mngadddeal.php" method="POST">
                <!--                Animal ID: <br> <input type="text" name="animalID"><br><br>-->
                Animal Type: <br>
                <select name="animaltype">
                    <?php
                    if ($count_rows !== 0) {
                        while ($list = mysqli_fetch_row($result)) {
                            echo "<option value= " . $list[0] . ">" . $list[1] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";
                        }
                    }
                    ?>
                </select>
                <br><br>
                <!--                Animal Type: <br> <input type="text" name="animaltype"><br><br>-->
                Age: <br> <input type="text" name="age"><br><br>
                Name: <br> <input type="text" name="name"><br><br>
                <input type="submit" name="submit" id="login" value="Submit">
            </form>


        </section>
    </div>
</div>
<br>
<br>
<?php //include '../shared/script.php'; ?>
</body>
</html>