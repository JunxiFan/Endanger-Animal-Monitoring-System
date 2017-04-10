<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/4/6
 * Time: 15:26
 */
if (isset($_POST["submit"]) && $_POST["submit"] == "Register") {

    $id = $_POST["id"];
    $user = $_POST["username"];
    $psw = $_POST["password"];
    $position = $_POST["position"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    if ($id == "" || $user == "" || $psw == "" || $position == "" || $firstname == "" || $lastname == "") {
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

        $sql = "select ID, Username from account where username = '$_POST[username]' or ID ='$_POST[id]';"; //SQL语句


        $result = $mysqli->query($sql);
        $num = mysqli_num_rows($result);
        if ($num)    //如果已经存在该用户
        {
            echo "<script>alert('ID/username already exists!'); history.go(-1);</script>";

        } else {
            $sql_insert = "insert into account (ID,Username,Password,Job,Firstname,Lastname) 
                            values('$_POST[id]','$_POST[username]','$_POST[password]','$_POST[position]','$_POST[firstname]','$_POST[lastname]')";
            //$res_insert = mysql_query($sql_insert);
            $sql_insert_tech = "insert into staff (StaffID,Firstname,Lastname) 
                                values('$_POST[id]','$_POST[firstname]','$_POST[lastname]')";
            $sql_insert_analyst = "insert into analyst (AnalystID, Firstname,Lastname) 
                                values('$_POST[id]','$_POST[firstname]','$_POST[lastname]')";
            $sql_insert_vet = "insert into vet (VetID, Firstname,Lastname) 
                                values('$_POST[id]','$_POST[firstname]','$_POST[lastname]')";
            $res_insert = $mysqli->query($sql_insert);
            //$num_insert = mysql_num_rows($res_insert);


            if ($res_insert && $position = "tech") {
                $res_insert_tech = $mysqli->query($sql_insert_tech);
                if ($res_insert_tech) {
                    echo "<script>alert('Registration complete'); //history.go(-1);</script>";
                } else {
                    echo "<script>alert('Add to tech table failed!'); //history.go(-1);</script>";
                }

            } else if ($res_insert && $position == "analyst") {
                $res_insert_analyst = $mysqli->query($sql_insert_analyst);
                if ($res_insert_analyst) {
                    echo "<script>alert('Registration complete'); //history.go(-1);</script>";
                } else {
                    echo "<script>alert('Add to analyst table failed!'); //history.go(-1);</script>";
                }
            } else if ($res_insert && $position == "vet") {
                $res_insert_vet = $mysqli->query($sql_insert_vet);
                if ($res_insert_vet) {
                    echo "<script>alert('Registration complete'); //history.go(-1);</script>";
                } else {
                    echo "<script>alert('Add to vet table failed!'); //history.go(-1);</script>";
                }
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