<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/4/1
 * Time: 21:25
 */

if (isset($_POST["submit"]) && $_POST["submit"] == "Submit") {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $resume = $_POST["resume"];
    $email = $_POST["email"];
    if ($firstname == "" || $lastname == "" || $address == "" || $phone == "" || $resume == "" || $email == "") {
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
        $sql_check = "select Firstname, Lastname from volunteer where Firstname=$firstname and Lastname=$lastname";
        $result_check = $mysqli->query($sql_check);
        $num = mysqli_num_rows($result_check);
        if ($num) {
            echo "<script>alert('Please do not submit twice!'); history.go(-1);</script>";
        } else {

            $sql_insert = "insert into volunteer (Firstname, lastname, Address, PhoneNumber, Resume, Email) 
                      values('$firstname','$lastname','$address', '$phone','$resume','$email')";
            $res_insert = $mysqli->query($sql_insert);
            if ($res_insert) {

                echo "<script>alert('Done! Thank you！'); history.go(-1);</script>";

            } else {
                echo "<script>alert('System is busy, please wait！'); history.go(-1);</script>";
            }
        }
    }
} else {
    echo "<script>alert('submit failed！'); 
    //history.go(-1);
    </script>";
}
?>