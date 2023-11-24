<?php


if(isset($_REQUEST['id']))
{
    $admin_id=$_REQUEST['id'];
    include ("database_connection.php");
    $delete_object=new Dataquery();
    $condition=array("admin_id"=>$admin_id);
    $result=$delete_object->deletedata('admin',$condition);
    header("Location:view_authorisation.php");
}
?>