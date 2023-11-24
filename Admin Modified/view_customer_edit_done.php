<?php
$customer_id=$_POST['cus_id'];
$customer_name=$_POST['cus_nm'];
$customer_email=$_POST['cus_em'];
$customer_number=$_POST['cus_num'];
include ("database_connection.php");
$insertobj=new Dataquery();
$setparmeter=array("Customer_name"=>$customer_name,"Customer_email"=>$customer_email,"Customer_number"=>$customer_number);
$condition=array("Customer_id"=>$customer_id);
$result=$insertobj->updatedate('customer',$setparmeter,$condition);
//echo $result;
//echo "update successful";
header("Location:view_customer.php");

?>