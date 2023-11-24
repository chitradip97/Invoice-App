
<?php
include('includes/header_file.php');
?>
<?php
include ("database_connection.php");
$insertobj=new Dataquery();
$result=$insertobj->getdata('*','category'," ");
//print_r($result);
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
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>Stock</th>
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
                                    <td><?php echo $list['category_id'];?></td>
                                    <td><?php echo $list['category_name'];?></td>
                                    <td><?php echo $list['category_stock'];?></td>
                                    <td>
                                        <a href="view_category_edit.php?id=<?php echo $list['category_id'];?>"><button type="button" class="btn btn-success">Edit</button></a>
                                        <a href="view_category_delete.php?id=<?php echo $list['category_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                
                                <?php
                                }
                                }
                                else{
                                    echo "<td colspan='6' align='center'>No Record Found</td>";
                                }
                            ?>
                            </tbody>
                                <!-- <tr>
                                    <td>2</td>
                                    <td>Beverage</td>
                                    <td>250</td>
                                    <td>
                                    <a href="view_category_edit.php"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="view_category_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Pharmacy</td>
                                    <td>1000</td>
                                    <td>
                                    <a href="view_category_edit.php"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="view_category_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Dairy</td>
                                    <td>750</td>
                                    <td>
                                    <a href="view_category_edit.php"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="view_category_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                -->
                                
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