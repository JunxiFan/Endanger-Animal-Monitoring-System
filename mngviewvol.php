<!doctype html>
<html>
<head>
    <title>mng view application</title>
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

<div class="typrography">
    <div class="container">
        <section id="tables">
            <div class="bs-docs-example">
                <h3 style="text-align:center">View Application</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Application ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Resume</th>
                        <th>E-mail</th>
                        <!--                    <th>Order Items</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php



                    $DB_HOST = 'localhost';
                    $DB_PORT = '3306';
                    $DB_USER = 'root';
                    $DB_PASS = '';
                    $DB_NAME = 'aqua';
                    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

                    $sql = "select * from volunteer;";
                    $result = $mysqli->query($sql);
                    if (!$result) {
                        die('Could not get data: ' . mysql_error());
                    }
                    while ($volInfo = mysqli_fetch_array($result)) {
                        $ID = $volInfo[0];
                        $firstname = $volInfo[1];
                        $lastname = $volInfo[2];
                        $address = $volInfo[3];
                        $phone = $volInfo[4];
                        $resume = $volInfo[5];
                        $email = $volInfo[6];


                        //$sql = "select type,imgpath from product where gid = $pid";
//
//                        <td><span class="badge">42</span></td>
                        echo "<tr>";
                        echo "<td><span class='badge'>$ID</span></td>";
                        echo "<td>$firstname</td>";
                        echo "<td>$lastname</td>";
                        echo "<td>$address</td>";
                        echo "<td>$phone</td>";
                        echo "<td>$resume</td>";
                        echo "<td>$email</td>";
                        echo "</tr>";
                    }
                    ?>
                    <!--						<tr><td><img src="Images/chineseknot/chineseknot.png" alt="item4" height="50px" width="80px"><br> Chineseknot 2</td></tr>	-->
                    </tbody>
                </table>


            </div>
        </section>
    </div>
</div>
<br>
<br>
<?php //include '../shared/script.php'; ?>
</body>
</html>