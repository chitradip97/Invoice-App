<?php

if($_POST['d1']!="")
{
    $admin_name=$_POST['d1'];
    $admin_em=$_POST['d2'];
    $admin_num=$_POST['d3'];
    
    $field_data=("admin_name,admin_email,admin_num");
    //echo"$uname $upassword";
    $table_name="admin";
    $values="'".$admin_name."','".$admin_em."','".$admin_num."'";
    include ("database_connection.php");
    //echo($field_data."<br>".$table_name."<br>".$values);
    //echo "<br>";
    $sql="insert into $table_name ($field_data) values($values)";
    //echo(" $sql");
    $insertobj=new Dataquery();
    $insertobj->insertdata($field_data,$table_name,$values);
    echo "<h3 style='color:green;'>Insert Successsfully done</h3>";
    
}
?>