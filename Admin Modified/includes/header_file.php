<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <title>Hello, world!</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- <script>
$(document).ready(function(){
$("#f1").click(function(){
   // console.log("hello");
    var category_nm=$(".cat_nm").val();
    var desc=$(".cat_dec").val();
   
    //console.log(user_id);
    $.ajax({
        type:"POST",
        url:"add_category_backend.php",
        data:{d1:category_nm,d2:desc},
        success:function(val){
            $("#alert_contain").html(val);
        }
    });
});
});
</script> -->
  </head>
  <body>
    <?php 
    include('navbar3.php');
    ?>
    <?php
    include('includes/sidenav.php')
    ?>
   
