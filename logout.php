<?php
/**
 * Created by IntelliJ IDEA.
 * User: fjx19
 * Date: 2017/3/28
 * Time: 20:36
 */
session_start();
if (isset($_SESSION['id'])) {
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['carts']);
    unset($_SESSION['filepath']);
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

<input id="btnClientRegister" class="button_1" name="submit" type="button" value="取消"
       onclick="window.location.href='/dangdang/cart/cart_toCart.action'"/>

<input id="btnClientRegister" class="button_1" name="submit" type="button" value="下一步"

       onclick="window.location.href='/dangdang/order/toAddress.action'"/>


