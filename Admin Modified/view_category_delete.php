<?php
if(isset($_REQUEST['id']))
{
    $cat_id=$_REQUEST['id'];
    include ("database_connection.php");
    $delete_object=new Dataquery();
    $condition=array("category_id"=>$cat_id);
    $result=$delete_object->deletedata('category',$condition);
    header("Location:view_category.php");
}

?>