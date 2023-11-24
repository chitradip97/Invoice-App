<?php


if(isset($_REQUEST['id']))
{
    $user_id=$_REQUEST['id'];
    include ("database_connection.php");
    $delete_object=new Dataquery();
    $condition=array("user_id"=>$user_id);
    $result=$delete_object->deletedata('user_data',$condition);
    header("Location:view_authorisation.php");
}
?>