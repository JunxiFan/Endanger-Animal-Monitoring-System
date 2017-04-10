<!doctype html>
<html>
<head>
    <title>analyst view donation</title>
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
                <h3 style="text-align:center">Donation Amount</h3>
                <form role="form" align="center" name="updateEmp" id="updateEmp" action="analystviewdonor.php"
                      method="post">

                    Animal ID: <br> <input type="text" name="animalID"><br>
                    <br>
                    <input type="submit" name="submit" id="login" value="Search">

                </form>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Animal ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Sum of Donation</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if (isset($_POST["submit"]) && $_POST["submit"] == "Search") {

                        $DB_HOST = 'localhost';
                        $DB_PORT = '3306';
                        $DB_USER = 'root';
                        $DB_PASS = '';
                        $DB_NAME = 'aqua';
                        $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

                        $sql_search = "select donor.AnimalID, animal.Name, standard.Name, sum(donor.Amount)
                          from (animal join standard on animal.TypeID = standard.TypeID)
                          join donor on animal.AnimalID = donor.AnimalID
                          where donor.AnimalID = $_POST[animalID] ";
                        $result_search = $mysqli->query($sql_search);
                        if (!$result_search) {
                            die('Could not get data: ' . mysql_error());
                        }
                        while ($animalInfo = mysqli_fetch_array($result_search)) {
                            $animalID = $animalInfo[0];
                            $animalName = $animalInfo[1];
                            $typename = $animalInfo[2];
                            $Sum = $animalInfo[3];

                            if ($animalID) {
                                echo "<tr>";
                                echo "<td><span class='badge'>$animalID</span></td>";
                                echo "<td>$animalName</td>";
                                echo "<td>$typename</td>";
                                echo "<td>$Sum</td>";
                            } else {
                                echo "<script>alert('No result!'); history.go(-1);</script>";
                            }
                            echo "</tr>";

                        }
                    }
                    ?>
                    </tbody>
                </table>


                <h3 style="text-align:center">Donation Information</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Donation ID</th>
                        <th>Animal ID</th>
                        <th>Name</th>
                        <th>Adress</th>
                        <th>Phone Number</th>
                        <th>Animal</th>
                        <th>Amount</th>
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

                    $sql = "select donor.DonationID, donor.AnimalID, donor.Name, donor.Address, donor.PhoneNumber, animal.name,donor.Amount 
                            from donor join animal on donor.AnimalID = animal.AnimalID";
                    $result = $mysqli->query($sql);
                    if (!$result) {
                        die('Could not get data: ' . mysql_error());
                    }
                    while ($collarInfo = mysqli_fetch_array($result)) {
                        $donationID = $collarInfo[0];
                        $animalID = $collarInfo[1];
                        $name = $collarInfo[2];
                        $address = $collarInfo[3];
                        $phone = $collarInfo[4];
                        $animal = $collarInfo[5];
                        $amount = $collarInfo[6];


                        //$sql = "select type,imgpath from product where gid = $pid";
//
//                        <td><span class="badge">42</span></td>
                        echo "<tr>";
                        echo "<td><span class='badge'>$donationID</span></td>";
                        echo "<td>$animalID</td>";
                        echo "<td>$name</td>";
                        echo "<td>$address</td>";
                        echo "<td>$phone</td>";
                        echo "<td>$animal</td>";
                        echo "<td>$amount</td>";
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