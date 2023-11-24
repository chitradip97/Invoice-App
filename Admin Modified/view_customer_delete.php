<?php

if(isset($_REQUEST['id']))
{
    $cus_id=$_REQUEST['id'];
    include ("database_connection.php");
    $delete_object=new Dataquery();
    $condition=array("Customer_id"=>$cus_id);
    $result=$delete_object->deletedata('customer',$condition);
    header("Location:view_customer.php");
}

?>