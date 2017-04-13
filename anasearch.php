<!doctype html>
<html>
<head>


    <title>Search</title>
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
                <h3 style="text-align:center">Manage Employees</h3>

                <form role="form" align="center" name="updateEmp" id="updateEmp" action="anasearch.php"
                      method="post">

                    Animal ID: <br> <input type="text" name="animalID"><br>
                    <br>
                    <input type="submit" name="submit" id="login" value="Search">

                </form>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Data ID</th>
                        <th>Animal ID</th>
                        <th>Type</th>
                        <th>Collar ID</th>
                        <th>Record Time</th>
                        <th>Heart Beats</th>
                        <th>Respire</th>
                        <th>Temperature</th>
                        <th>Location</th>

                        <!--                    <th>Order Items</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    ?>

                    <?php
                    if (isset($_POST["submit"]) && $_POST["submit"] == "Search") {

                        $DB_HOST = 'localhost';
                        $DB_PORT = '3306';
                        $DB_USER = 'root';
                        $DB_PASS = '';
                        $DB_NAME = 'aqua';
                        $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

                        $sql = "select * from collardata_search where AnimalID = $_POST[animalID]; ";
                        $result = $mysqli->query($sql);
                        if (!$result) {
                            die('Could not get data: ' . mysql_error());
                        }
                        while ($animalInfo = mysqli_fetch_array($result)) {
                            $dataID = $animalInfo[0];
                            $animalID = $animalInfo[1];
                            $typename = $animalInfo[2];
                            $collarID = $animalInfo[3];
                            $rectime = $animalInfo[4];
                            $beat = $animalInfo[5];
                            $respire = $animalInfo[6];
                            $temp = $animalInfo[7];
                            $location = $animalInfo[8];

                            if($dataID) {
                                echo "<tr>";
                                echo "<td><span class='badge'>$dataID</span></td>";
                                echo "<td>$animalID</td>";
                                echo "<td>$typename</td>";
                                echo "<td>$collarID</td>";
                                echo "<td>$rectime</td>";
                                echo "<td>$beat</td>";
                                echo "<td>$respire</td>";
                                echo "<td>$temp</td>";
                                echo "<td><a href='https://www.google.com/maps/search/$location'>$location</a></td>";
                            }else{
                                echo "<script>alert('Search Failed!'); history.go(-1);</script>";
                            }

//        echo "<td><a href='../deals/mngempupdate.php?empID=" . $ID . "'>Update</a></td>";
//        echo "<td><a href='../deals/mngempdel.php?empID=" . $ID . "'>Delete</a></td>";

//                        echo "&nbsp<a href='test2-1.php?id=" . $re[0] . "'>删除</a><br />";


//                    echo "<td><img src=$imgpath alt=\"item1\" height=\"40px\" width=\"60px\"><br> $pname $ptype</td>";
                            echo "</tr>";

                        }
                    }
//                    else {
//                        echo "<script>alert('aaa Failed!'); history.go(-1);</script>";
//                    }

                    ?>
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