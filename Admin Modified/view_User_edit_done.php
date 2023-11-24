<?php
$user_id=$_POST['us_id'];
$user_name=$_POST['us_nm'];
$user_email=$_POST['us_em'];
$user_number=$_POST['us_num'];
include ("database_connection.php");
$insertobj=new Dataquery();
$setparmeter=array("user_name"=>$user_name,"user_email"=>$user_email,"user_num"=>$user_number);
$condition=array("user_id"=>$user_id);
$result=$insertobj->updatedate('user_data',$setparmeter,$condition);
 
//echo "update successful";
header("Location:view_authorisation.php");

?>