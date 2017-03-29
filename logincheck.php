<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/3/28
 * Time: 13:10
 */
if (isset($_POST["submit"]) && $_POST["submit"] == "Log in") {

    $user = $_POST["username"];
    $psw = $_POST["password"];
    if ($user == "" || $psw == "") {
        echo "<script>alert('Input username or password first！'); history.go(-1);</script>";
    } else {
        $DB_HOST = 'localhost';
        $DB_PORT = '3306';
        $DB_USER = 'root';
        $DB_PASS = '';
        $DB_NAME = 'angularcode_task';
        $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        //$mysqli = new mysqli("localhost:8889", "root", "root", "angularcode_task");
        //echo "<script>alert('DB connected');</script>";

        /*
        $link = mysql_connect("127.0.0.1:8889","root","root");
        if(!$link){
            echo "<script>alert('DB unconnected');</script>";
        }
        mysql_select_db("angularcode_task");
        mysql_query("set names 'gbk'");*/
        //echo "<script>alert('DB connected'); history.go(-1);</script>";
        $sql = "select id,username,job from p_user where username = '$user' and password = '$psw'";
        $result = $mysqli->query($sql);
        $num = mysqli_num_rows($result);
        //$row = $result->fetch_assoc();
        //$result = mysql_query($sql);
        //$num = mysql_num_rows($result);
        if ($num) {
            session_start();
            //$row = mysql_fetch_array($result);  //将数据以索引方式储存在数组中
            $row = mysqli_fetch_array($result);
            $_SESSION['id'] = $row[0];
            $_SESSION['username'] = $row[1];
            $_SESSION['job'] = $row[2];


//
            if ($row[2] == "admin") {
                $_SESSION['web'] = 'gallery.php';
            } elseif ($row[2] == "tech") {
                $_SESSION['web'] = 'contact.php';

            }
            header('location:../' . $_SESSION['web']);
            exit;
//                echo "</li>";
//                echo "<li><a href=\"../views/logout.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Log out</a></li>";
//                echo "<li><a href=\"../views/search.php\"><span class=\"glyphicon glyphicon-search\"></span></a></li>";


//            header("Location: ../index.php");

//            exit;
            //echo "<script>history.go(-1);</script>";
        } else {
            echo "<script>alert('Username and password not match！');history.go(-1);</script>";
        }
    }
} else {
    echo "<script>alert('Submit failed！'); history.go(-1);</script>";
}

?>