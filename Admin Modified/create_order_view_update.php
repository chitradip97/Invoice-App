<?php
session_start();

$name=$_POST['name1'];
$price=$_POST['name2'];
$quantity=$_POST['name3'];
$event=$_POST['event'];
// $product_list[0]=$name;
// $product_list[1]=$price;
// $product_list[2]=$quantity;
if($event=='Update')
{
    $_SESSION[$name][1]=$name;
    $_SESSION[$name][2]=$price;
    $_SESSION[$name][3]=$quantity;
}
else if($event=='Delete')
{
    unset($_SESSION[$name]);
}
header("Location:create_order.php");


?>