<?php

if($_POST['d1']!="")
{
    $user_name=$_POST['d1'];
    $user_em=$_POST['d2'];
    $user_num=$_POST['d3'];
    
    $field_data=("user_name,user_email,user_num");
    //echo"$uname $upassword";
    $table_name="user_data";
    $values="'".$user_name."','".$user_em."','".$user_num."'";
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