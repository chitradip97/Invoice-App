
<?php
include('includes/header_file.php');
?>
<?php
include ("database_connection.php");
$viewobject=new Dataquery();
$columnname1='category_id';
$tablename1='category';
$result=$viewobject->countdata($columnname1,$tablename1," ");
//$viewobject2=new Dataquery();
$columnname2='product_id';
$tablename2='product';
$result2=$viewobject->countdata($columnname2,$tablename2," ");
//print_r($result2);
//$viewobject3=new Dataquery();
$columnname3='admin_id';
$tablename3='admin';
$result3=$viewobject->countdata($columnname3,$tablename3," ");
//print_r($result3);
$columnname4='Customer_id';
$tablename4='customer';
$result4=$viewobject->countdata($columnname4,$tablename4," ");
$columnname5='order_id';
$tablename5='orders';
$order_date=date('y-m-d');
$date_str="'".$order_date."'";
$condition=array('order_date'=>$date_str);
$result5=$viewobject->countdata($columnname5,$tablename5,$condition);
$columnname6='order_id';
$tablename6='orders';
$result6=$viewobject->countdata($columnname6,$tablename6," ");
?>

 <!-- Content Area-->
 <div class="content_footer">
            <!-- Body Area -->
            <div class="content_section">
               <div class="container-fluid">
                <h3 class="basic_font">Dashboard</h1>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                    <div class="card  mb-4 ">
                        <div class="card-body"> <h5 class="basic_font">Total Category</h5> </div>
                        <?php
                                
                                if(isset($result[0]))
                                    {
                                        //print_r($result);
                                    foreach($result as $list)
                                    {
                                ?>
                        <div class="card-footer d-flex align-items-center justify-content-between"><h6 class="basic_font"><b><?php echo $list['count(category_id)'];?></b> </h6></div>
                        <?php
                                }
                                }
                                else{
                                    echo "<td colspan='6' align='center'>No Record Found</td>";
                                }
                                ?>
                    </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                    <div class="card  mb-4 ">
                        <div class="card-body"> <h5 class="basic_font">Total Product</h5> </div>
                        <?php
                                
                                 if(isset($result2[0]))
                                    {
                                       // print_r($result2);
                                    foreach($result2 as $list1)
                                    {
                                ?>
                        <div class="card-footer d-flex align-items-center justify-content-between"><h6 class="basic_font"><b><?php echo $list1['count(product_id)'];?></b> </h6></div>
                        <?php
                                }
                                }
                                else{
                                    echo "<td colspan='6' align='center'>No Record Found</td>";
                                }
                                ?>
                    </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                    <div class="card  mb-4 ">
                        <div class="card-body"> <h5 class="basic_font">Total Admin</h5> </div>
                        <?php
                                
                                if(isset($result3[0]))
                                    {
                                       // print_r($result3);
                                    foreach($result3 as $list2)
                                    {
                                ?>
                        <div class="card-footer d-flex align-items-center justify-content-between"><h6 class="basic_font"><b><?php echo $list2['count(admin_id)'];?></b></h6></div>
                        <?php
                                }
                                }
                                else{
                                    echo "<td colspan='6' align='center'>No Record Found</td>";
                                }
                                ?>
                    </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                    <div class="card  mb-4 ">
                        <div class="card-body"> <h5 class="basic_font">Total Customer</h5> </div>
                        <?php
                                
                                if(isset($result4[0]))
                                    {
                                        //print_r($result4);
                                    foreach($result4 as $list)
                                    {
                                ?>
                        <div class="card-footer d-flex align-items-center justify-content-between"><h6 class="basic_font"><b><?php echo $list['count(Customer_id)'];?></b> </h6></div>
                        <?php
                                }
                                }
                                else{
                                    echo "<td colspan='6' align='center'>No Record Found</td>";
                                }
                                ?>
                    </div>
                    </div>
                </div>
                <h3 class="basic_font">Orders</h1>
                <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card  mb-4 ">
                        <div class="card-body"> <h5 class="basic_font">Today Orders</h5> </div>
                        <?php
                                
                                if(isset($result5[0]))
                                    {
                                        //print_r($result4);
                                    foreach($result5 as $list)
                                    {
                                ?>
                        <div class="card-footer d-flex align-items-center justify-content-between"><h6 class="basic_font"><b><?php echo $list['count(order_id)'];?></b> </h6></div>
                        <?php
                                }
                                }
                                else{
                                    echo "<td colspan='6' align='center'>No Record Found</td>";
                                }
                                ?>
                    </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                    <div class="card  mb-4 ">
                        <div class="card-body"> <h5 class="basic_font">Total Orders</h5> </div>
                        <?php
                                
                                if(isset($result6[0]))
                                    {
                                        //print_r($result4);
                                    foreach($result6 as $list)
                                    {
                                ?>
                        <div class="card-footer d-flex align-items-center justify-content-between"><h6 class="basic_font"><?php echo $list['count(order_id)'];?></h6></div>
                        <?php
                                }
                                }
                                else{
                                    echo "<td colspan='6' align='center'>No Record Found</td>";
                                }
                                ?>
                    </div>
                    </div>
                </div>

               </div>
               
           </div>
           

<?php
include('includes/footer.php');
?>