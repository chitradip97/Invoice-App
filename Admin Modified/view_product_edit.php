
<?php
include('includes/header_file.php');
?>
<?php
$updateId='';
if(isset($_REQUEST['id']))
{
$updateId=$_REQUEST['id'];
include ("database_connection.php");
$insertobj=new Dataquery();
$select_id=array("product_id"=>$updateId);
$less_result=$insertobj->get_lessdata('*','product',$select_id);
$more_result=$insertobj->get_moredata('*','product',$select_id);
$result=$insertobj->getdata('*','product',$select_id);
//print_r($result);
}
?>

 <!-- Content Area-->
 <div class="content_footer">
            <!-- Body Area -->
            <div class="content_section">
                <div class="container-fluid">
                
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                    <div class="card  ">
                        <div class="card-footer"> <h5 class="basic_font">Category List :</h5> </div>
                        <div class="card-body ">
                        

  
                                           
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>PRODUCT ID</th>
                                    <th>PRODUCT NAME</th>
                                    <th>PRODUCT CATEGORY</th>
                                    <th>PRODUCT PRICE</th>
                                    <th>PRODUCT QUANTITY</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                              if(isset($less_result[0]))
                              {
                              foreach($less_result as $list)
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
                            //   else{
                            //       echo "<td colspan='6' align='center'>No Record Found</td>";
                            //   }
                              ?>
                              <?php
                             
                            if(isset($result[0]))
                                {
                                foreach($result as $list)
                                {
                                ?>
                                
                                <tr><form action='view_product_edit_done.php' method='POST'>
                                    <td>
                                      <input type="number" name="prod_id" value="<?php echo $list['product_id'];?>" readonly>  
                                    </td>
                                    <td>
                                      <input type="text" name="prod_nm" value="<?php echo $list['product_name'];?>">  
                                    </td>
                                    <td>
                                      <input type="text" name="prod_cat_nm" value="<?php echo $list['category_name'];?>">  
                                    </td>
                                    <td>
                                      <input type="text" name="prod_prc" value="<?php echo $list['product_price'];?>">  
                                    </td>
                                    <td>
                                      <input type="text" name="prod_qnty" value="<?php echo $list['product_quantity'];?>">  
                                    </td>
                                    <td>
                                    <input type='submit' name='update' value='Done' class="btn btn-success"></form>
                                        <!-- <a href="view_category_edit.php?id="><button type="button" class="btn btn-success">Done</button></a> -->
                                        <a href="view_product_delete.php?id=<?php echo $list['product_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>

                                
                                
                                <?php
                                }
                                }
                                // else{
                                //     echo "<td colspan='6' align='center'>No Record Found</td>";
                                // }
                                ?>

<?php
                              if(isset($more_result[0]))
                              {
                              foreach($more_result as $list)
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
                            //   else{
                            //       echo "<td colspan='6' align='center'>No Record Found</td>";
                            //   }
                              ?>
                              

                              
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