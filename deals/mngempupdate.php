<!doctype html>
<html>
<head>
    <title>manage update employees</title>
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
            <h3 style="text-align:center">Update Employee's Information</h3>
            <br><br>
            <?php
            $s = $_GET['empID'];

            $DB_HOST = 'localhost';
            $DB_PORT = '3306';
            $DB_USER = 'root';
            $DB_PASS = '';
            $DB_NAME = 'aqua';
            $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

            $sql = "select ID, Username,Password,Job,Firstname, Lastname from account where id = $s";
            $result = $mysqli->query($sql);
            $num = mysqli_num_rows($result);
            if ($num) {
                $empInfo = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中

                session_start();
                $_SESSION['empID'] = $empInfo[0];
                $username = $empInfo[1];
                $psw = $empInfo[2];
                $position = $empInfo[3];
                $firstname = $empInfo[4];
                $lastname = $empInfo[5];

            } else {
                echo "<script>alert('Insert data failed');</script>";
            }
            ?>

            <form role="form" align="center" name="updateEmp" id="updateEmp" action="mngupdatedeal.php"
                  method="post">

                Username: <br> <input type="text" name="username" <?php echo "value=\"$username\""; ?>><br>
                Password: <br> <input type="text" name="password" <?php echo "value=\"$psw\""; ?>><br>

                <!--                Position: <br> <input type="text" name="position" -->

                <div class="divinline col-offset-sm-1 col-sm-3">
                    <label for="pw">Position</label>
                    <div class="input">
                        <select class="form-control" id="position" name="position"
                                onfocus="this.defaultIndex=this.selectedIndex;"
                                onchange="this.selectedIndex=this.defaultIndex;">
                            <option <?php echo "value=\"$position\""; ?>>Default</option>
                            <option value="tech">Technical Staff</option>
                            <option value="analyst">Analyst</option>
                            <option value="vet">Vet</option>
                        </select>
                    </div>
                </div>
                <br>

                First Name: <br> <input type="text" name="firstname" <?php echo "value=\"$firstname\""; ?>><br>
                Last Name: <br> <input type="text" name="lastname" <?php echo "value=\"$lastname\""; ?>><br>

                <input type="submit" name="submit" id="login" value="Update">
            </form>


        </section>
    </div>
</div>
<br>
<br>
<?php //include '../shared/script.php'; ?>
</body>
</html>