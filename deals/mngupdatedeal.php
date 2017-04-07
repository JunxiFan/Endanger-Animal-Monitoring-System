<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/4/5
 * Time: 12:54
 */
session_start();
$s = $_SESSION['empID'];

if (isset($_POST["submit"]) && $_POST["submit"] == "Update") {

    $firstname=$_POST['firstname'];

//    $s = $_GET['empID'];
    $DB_HOST = 'localhost';
    $DB_PORT = '3306';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'aqua';
    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
    $sql = "update account set Username='$_POST[username]', Password='$_POST[password]',Job='$_POST[position]', Firstname='$firstname', Lastname='$_POST[lastname]' where ID='$s'";
//    $sql = "update account set  Firstname='$firstname' where ID='$s'";
    $res = $mysqli->query($sql);
    //$num_insert = mysql_num_rows($res_insert);
    if ($res) {
        echo "<script>alert('Update successfully！');</script>";
    } else {
        echo "<script>alert('failed！');</script>";
    }
}else{
    echo "<script>alert('System is busy!');</script>";
}
echo "";
?>