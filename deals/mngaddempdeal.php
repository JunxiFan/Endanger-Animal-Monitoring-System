<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/4/6
 * Time: 15:26
 */
    if (isset($_POST["submit"]) && $_POST["submit"] == "Register") {

        $user = $_POST["username"];
        $psw = $_POST["password"];
        $position = $_POST["position"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];

        if ($user == "" || $psw == "" ||  $position == "" || $firstname == "" || $lastname == "") {
            echo "<script>alert('Please Insert Every Details！'); history.go(-1);</script>";
        } else {

            $DB_HOST = 'localhost';
            $DB_PORT = '3306';
            $DB_USER = 'root';
            $DB_PASS = '';
            $DB_NAME = 'aqua';
            $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $sql = "select Username from account where username = '$_POST[username]'"; //SQL语句


            $result = $mysqli->query($sql);
            $num = mysqli_num_rows($result);
            if ($num)    //如果已经存在该用户
            {
                echo "<script>alert('username already exist!'); history.go(-1);</script>";

            } else {
                $sql_insert = "insert into account (Username,Password,Job,firstname,lastname) values('$_POST[username]','$_POST[password]','$_POST[position]','$_POST[firstname]','$_POST[lastname]')";
                //$res_insert = mysql_query($sql_insert);
                $res_insert = $mysqli->query($sql_insert);
                //$num_insert = mysql_num_rows($res_insert);

                if ($res_insert) {
                    echo "<script>alert('Registration complete'); //history.go(-1);</script>";
                } else {
                    echo "<script>alert('System is busy, please wait.'); //history.go(-1);</script>";

                }
            }
        }
    } else {
        echo "<script>alert('submit failed！'); 
    //history.go(-1);
    </script>";
    }
    ?>