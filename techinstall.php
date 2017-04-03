<!doctype html>
<html>
<head>
    <title>tech staff install</title>
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
                <h3 style="text-align:center">Install Equipment</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Animal's ID</th>
                        <th>Type</th>
                        <th>Operation</th>
                        <!--                    <th>Order Items</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    session_start();


                    $DB_HOST = 'localhost';
                    $DB_PORT = '3306';
                    $DB_USER = 'root';
                    $DB_PASS = '';
                    $DB_NAME = 'endanger_animal';
                    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

                    $sql = "select monitoringanimal.AnimalID, animal.Name from monitoringanimal join animal on monitoringanimal.AnimalTypeID = animal.AnimalTypeID and monitoringanimal.status ='0';";
                    $result = $mysqli->query($sql);
                    if (!$result) {
                        die('Could not get data: ' . mysql_error());
                    }
                    while ($animalInfo = mysqli_fetch_array($result)) {
                        $animalID = $animalInfo[0];
                        $type = $animalInfo[1];
//                        $name = $animalInfo[2];
                        //$sql = "select type,imgpath from product where gid = $pid";
//                    if ($pid == 1) {
//                        $imgpath = "../Images/fan/anxiangshuyingblue.jpg";
//                        $pname = "Fan";
//                    } else if ($pid == 2) {
//                        $imgpath = "../Images/papercut/fu.png";
//                        $pname = "Papercut";
//                    } else if ($pid == 3) {
//                        $imgpath = "../Images/plate/panzi2.png";
//                        $pname = "Plate";
//                    } else if ($pid == 4) {
//                        $imgpath = "../Images/chineseknot/chineseknot.png";
//                        $pname = "Chineseknot";
//                    } else if ($pid == 5) {
//                        $imgpath = $img;
//                        $pname = "Custom item";
//                    }
//                        <td><span class="badge">42</span></td>
                        echo "<tr>";
                        echo "<td><span class='badge'>$animalID</span></td>";
                        echo "<td>$type</td>";
                        echo "<td><a href='../deals/techinstalldeal.php?animalID=" . $animalID . "'>install</a></td>";

//                        echo "&nbsp<a href='test2-1.php?id=" . $re[0] . "'>删除</a><br />";


//                    echo "<td><img src=$imgpath alt=\"item1\" height=\"40px\" width=\"60px\"><br> $pname $ptype</td>";
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