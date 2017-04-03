<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/4/1
 * Time: 21:25
 */

if (isset($_POST["submit"]) && $_POST["submit"] == "Submit") {

    $animaltype = $_POST["animaltype"];
    $name = $_POST["name"];
    if ( $animaltype == "" || $name == "") {
        echo "<script>alert('Please Insert First！'); history.go(-1);</script>";
    } else {

        $DB_HOST = 'localhost';
        $DB_PORT = '3306';
        $DB_USER = 'root';
        $DB_PASS = '';
        $DB_NAME = 'endanger_animal';
        $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

//        $sql = "select username from p_user where username = '$_POST[username]'"; //SQL语句
//
//
//        $result = $mysqli->query($sql);
//        $num = mysqli_num_rows($result);
//        if ($num)    //如果已经存在该用户
//        {
//            echo "<script>alert('username already exist!'); history.go(-1);</script>";
//
//        } else    //不存在当前注册用户名称
//        {
        $sql_insert = "insert into monitoringanimal (AnimalTypeID, name, status) values('$animaltype','$name','0')";
        //$res_insert = mysql_query($sql_insert);
        $res_insert = $mysqli->query($sql_insert);
        //$num_insert = mysql_num_rows($res_insert);
        if ($res_insert) {

            echo "<script>alert('Add success！'); history.go(-1);</script>";
        } else {
            echo "<script>alert('failed！'); history.go(-1);</script>";
        }
    }

//    }
} else {
    echo "<script>alert('submit failed！'); 
    //history.go(-1);
    </script>";
}
?>