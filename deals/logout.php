<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/3/28
 * Time: 20:36
 */
//session_start();
if (isset($_SESSION['id'])) {
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
}
if (isset($_SESSION['id'])) {
    echo $_SESSION['id'];
    echo "failed";
} else {
    //echo "success";
    header("Location: ../index.php");
    exit;
    //echo "<script> history.go(-1);</script>";
}
?>




