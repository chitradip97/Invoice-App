<?php


if($_POST['d1']!="")
{
    $pname=$_POST['d2'];
    $cname=$_POST['d1'];
    $prod_description=$_POST['d3'];
    $prod_price=$_POST['d4'];
    $prod_qnty=$_POST['d5'];
    $field_data=("product_name,category_name,product_desc,product_price,product_quantity");
    //echo"$uname $upassword";
    $table_name="product";
    $values="'".$pname."','".$cname."','".$prod_description."',". $prod_price.",".$prod_qnty."";
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