<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/4/9
 * Time: 23:42
 */
session_start();
$DB_HOST = 'localhost';
$DB_PORT = '3306';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'aqua';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
$time = date("Y-m-d H:i:s");
if (isset($_POST["submit"]) && $_POST["submit"] == "Succeed") {
    $record = $_POST['record'];
    $sql1 = "insert into treatment (VetID,AnimalID,TreatmentRecord, TreatmentDate) 
            values('$_SESSION[id]','$_SESSION[animalID]', '$record','$time')";
    $result1 = $mysqli->query($sql1);

    $sql2 = "update animal set status='1' where AnimalID = '$_SESSION[animalID]'";
    $result2 = $mysqli->query($sql2);

    $sql3 = "delete from sickanimal where AnimalID = '$_SESSION[animalID]'";
    $result3 = $mysqli->query($sql3);
    if ($result1) {
        if ($result2) {
            if ($result3) {
                echo "<script>alert('Rescue Successfully！');</script>";
//                header('location:../' . $_SESSION['web']);
            } else {
                echo "<script>alert('Delete Sick Animal Failed!'); history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('update animal status Failed!'); history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Insert Treatment History Failed!.'); //history.go(-1);</script>";

    }
} else if (isset($_POST["submit"]) && $_POST["submit"] == "Fail") {
    $record = $_POST['record'];
    $sql1 = "insert into treatment (VetID,AnimalID,TreatmentRecord, TreatmentDate) 
            values('$_SESSION[id]','$_SESSION[animalID]', '$record','$time')";
    $result1 = $mysqli->query($sql1);

    $sql2 = "update animal set status='3' where AnimalID = '$_SESSION[animalID]'";
    $result2 = $mysqli->query($sql2);

    $sql3 = "delete from sickanimal where AnimalID = '$_SESSION[animalID]'";
    $result3 = $mysqli->query($sql3);
    if ($result1) {
        if ($result2) {
            if ($result3) {
                echo "<script>alert('You have tried your best.');</script>";
//                $url = "../deal/whitepage.php";
//                echo " <script language = 'javascript' type = 'text/javascript'> ";
//                echo " window.location.href = '$url' ";
//                echo " </script > ";
//                header('location:../' . $_SESSION['web']);
            } else {
                echo "<script>alert('Delete Sick Animal Failed!'); history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('update animal status Failed!'); history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Insert Treatment History Failed!.'); //history.go(-1);</script>";

    }
} else {
    echo "<script>alert('System is Busy, Please wait!'); //history.go(-1);</script>";
}
?>