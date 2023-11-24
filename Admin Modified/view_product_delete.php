<?php


if(isset($_REQUEST['id']))
{
    $product_id=$_REQUEST['id'];
    include ("database_connection.php");
    $delete_object=new Dataquery();
    $condition=array("product_id"=>$product_id);
    $result=$delete_object->deletedata('product',$condition);
    header("Location:view_product.php");
}
?>