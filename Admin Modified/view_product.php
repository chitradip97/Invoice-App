
<?php
include('includes/header_file.php');
?>
<?php
include ("database_connection.php");
$viewobject=new Dataquery();
$result=$viewobject->getdata('*','product'," ");
?>
 <!-- Content Area-->
 <div class="content_footer">
            <!-- Body Area -->
            <div class="content_section">
                <div class="container-fluid">
                
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                    <div class="card  ">
                        <div class="card-footer"> <h5 class="basic_font">Product List :</h5> </div>
                        <div class="card-body ">
                            
                                           
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product NAME</th>
                                    <th>Product Category</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                
                                if(isset($result[0]))
                                    {
                                    foreach($result as $list)
                                    {
                                ?>
                                <tr>
                                    <td><?php echo $list['product_id'];?></td>
                                    <td><?php echo $list['product_name'];?></td>
                                    <td><?php echo $list['category_name'];?></td>
                                    
                                    <td><?php echo $list['product_price'];?></td>
                                    <td><?php echo $list['product_quantity'];?></td>
                                    <td>
                                        <a href="view_product_edit.php?id=<?php echo $list['product_id'];?>"><button type="button" class="btn btn-success">Edit</button></a>
                                        <a href="view_product_delete.php?id=<?php echo $list['product_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>

                                <?php
                                }
                                }
                                else{
                                    echo "<td colspan='6' align='center'>No Record Found</td>";
                                }
                            ?>

                                <!-- <tr>
                                    <td>2</td>
                                    <td>Sprite</td>
                                    <td>Beverage</td>
                                    <td>250</td>
                                    <td>
                                    <a href="view_product_edit.php"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="view_product_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>ORS</td>
                                    <td>Pharmacy</td>
                                    <td>1000</td>
                                    <td>
                                    <a href="view_product_edit.php"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="view_product_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Amul Curd</td>
                                    <td>Dairy</td>
                                    <td>750</td>
                                    <td>
                                    <a href="view_product_edit.php"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="view_product_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr> -->
                               
                                </tbody>
                                </table>
                            <!-- </div> -->
                            
                        </div>
                    </div>
                    </div>
                    
                </div>
                </div>
                
               
           </div>
           

<?php
include('includes/footer.php');
?>