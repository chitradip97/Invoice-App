<?php


if($_POST['d1']!="")
{
    $customer_nm=$_POST['d1'];
    $customer_em=$_POST['d2'];
    $customer_num=$_POST['d3'];
    
    $field_data=("Customer_name,Customer_email,Customer_number");
    //echo"$uname $upassword";
    $table_name="customer";
    $values="'".$customer_nm."','".$customer_em."','".$customer_num."'";
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