<?php
$admin_id=$_POST['ad_id'];
$admin_name=$_POST['ad_nm'];
$admin_email=$_POST['ad_em'];
$admin_number=$_POST['ad_num'];
include ("database_connection.php");
$insertobj=new Dataquery();
$setparmeter=array("admin_name"=>$admin_name,"admin_email"=>$admin_email,"admin_num"=>$admin_number);
$condition=array("admin_id"=>$admin_id);
$result=$insertobj->updatedate('admin',$setparmeter,$condition);
 
//echo "update successful";
header("Location:view_authorisation.php");

?>