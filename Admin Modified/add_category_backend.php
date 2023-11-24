<?php
if($_POST['d1']!="")
{
    $cname=$_POST['d1'];
    $cdesc=$_POST['d2'];
    $field_data=("category_name,category_stock");
    //echo"$uname $upassword";
    $table_name="category";
    $values="'".$cname."',".$cdesc."";
    include ("database_connection.php");
    //echo($field_data."<br>".$table_name."<br>".$values);
    //echo "<br>";
    $sql="insert into $table_name ($field_data) values($values)";
    //echo(" $sql");
    $insertobj=new Dataquery();
    $insertobj->insertdata($field_data,$table_name,$values);
    echo "<h3 style='color:green;'>Insert Successsfully done</h3>";
    
}
//include "add_category.php";
?>