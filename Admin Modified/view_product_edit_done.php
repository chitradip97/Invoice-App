<?php
$product_id=$_POST['prod_id'];
$product_name=$_POST['prod_nm'];
$product_cat_name=$_POST['prod_cat_nm'];
$product_price=$_POST['prod_prc'];
$product_quantity=$_POST['prod_qnty'];
include ("database_connection.php");
$insertobj=new Dataquery();
$setparmeter=array("product_name"=>$product_name,"category_name"=>$product_cat_name,"product_price"=>$product_price,"product_quantity"=>$product_quantity);
$condition=array("product_id"=>$product_id);
$result=$insertobj->updatedate('product',$setparmeter,$condition);
 
//echo "update successful";
header("Location:view_product.php");

?>