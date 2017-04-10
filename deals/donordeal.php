<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/4/1
 * Time: 21:25
 */

if (isset($_POST["submit"]) && $_POST["submit"] == "I want to donate!") {

    $name = $_POST["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $animalID = $_POST["animalname"];
    $amount = $_POST["amount"];
    if ($name == "" || $address == "" || $phone == "" || $animalID == "" || $amount == "") {
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
//        $num = mysqli_num_rows($result);

        $sql_insert = "insert into donor (Name, Address, PhoneNumber, AnimalID, Amount) 
                      values('$name','$address', '$phone','$animalID','$amount')";
        $res_insert = $mysqli->query($sql_insert);
        if ($res_insert) {

            echo "<script>alert('Thank you！'); history.go(-1);</script>";

        } else {
            echo "<script>alert('System is busy, please wait！'); history.go(-1);</script>";
        }
    }
} else {
    echo "<script>alert('submit failed！'); 
    //history.go(-1);
    </script>";
}
?>