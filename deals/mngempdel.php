<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/4/5
 * Time: 10:53
 */

$s = $_GET['empID'];  //用GET的方式获取从地址栏那里传过来的ID

$DB_HOST = 'localhost';
$DB_PORT = '3306';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'aqua';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

//$time = date("Y-m-d H:i:s");
$sql_install = "delete from account where id = '$s'";//将选中的动物信息插入collar表中
$result1 = $mysqli->query($sql_install);



if ($result1) {
    echo "<script>alert('Deletion complete'); //history.go(-1);</script>";
} else {
    echo "<script>alert('System is busy, please wait.'); //history.go(-1);</script>";

}
//$sql_delete = "delete from monitoringanimal where AnimalID='$s'";//将已安装完的动物信息从表中删除
//$result2 = $mysqli->query($sql_delete);


?>