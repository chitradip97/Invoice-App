<?php
$category_id=$_POST['cat_id'];
$category_name=$_POST['cat_nm'];
$category_stock=$_POST['cat_stock'];
include ("database_connection.php");
$insertobj=new Dataquery();
$setparmeter=array("category_name"=>$category_name,"category_stock"=>$category_stock);
$condition=array("category_id"=>$category_id);
$result=$insertobj->updatedate('category',$setparmeter,$condition);
//echo "$result";
//echo "update successful";
header("Location:view_category.php");

?>