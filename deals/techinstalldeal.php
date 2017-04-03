<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/4/1
 * Time: 21:25
 */
session_start();
$s = $_GET['animalID'];  //用GET的方式获取从地址栏那里传过来的ID

$DB_HOST = 'localhost';
$DB_PORT = '3306';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'endanger_animal';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

$sql_install = "insert into collar (TechID,AnimalID) values('$_SESSION[id]', '$s')";//将选中的动物信息插入collar表中
$result1 = $mysqli->query($sql_install);

$sql_delete = "update monitoringanimal set status='1' where AnimalID = '$s'";//将已安装完的动物信息从表中删除
$result2 = $mysqli->query($sql_delete);

if ($result1) {
    if ($result2) {
        echo "<script>alert('Install Successfully！'); history.go(-1);</script>";
    } else {
        echo "<script>alert('Install Failed!'); history.go(-1);</script>";
    }
} else {
    echo "<script>alert('System is busy, please wait.'); //history.go(-1);</script>";

}
//$sql_delete = "delete from monitoringanimal where AnimalID='$s'";//将已安装完的动物信息从表中删除
//$result2 = $mysqli->query($sql_delete);

?>