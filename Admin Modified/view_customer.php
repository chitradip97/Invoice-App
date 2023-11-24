
<?php
include('includes/header_file.php');
?>
<?php
include ("database_connection.php");
$viewobj=new Dataquery();
$result=$viewobj->getdata('*','customer'," ");
?>

 <!-- Content Area-->
 <div class="content_footer">
            <!-- Body Area -->
            <div class="content_section">
                <div class="container-fluid">
                
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                    <div class="card  ">
                        <div class="card-footer"> <h5 class="basic_font">Customer List :</h5> </div>
                        <div class="card-body ">
                            
                                           
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Customer Id</th>
                                    <th>Customer NAME</th>
                                    <th>Customer Email</th>
                                    <th>Customer Phone</th>
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
                                    <td><?php echo $list['Customer_id'];?></td>
                                    <td><?php echo $list['Customer_name'];?></td>
                                    <td><?php echo $list['Customer_email'];?></td>
                                    <td><?php echo $list['Customer_number'];?></td>
                                    <td>
                                        <a href="view_customer_edit.php?id=<?php echo $list['Customer_id'];?>"><button type="button" class="btn btn-success">Edit</button></a>
                                        <a href="view_customer_delete.php?id=<?php echo $list['Customer_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
                                    <td>Shusant Khan</td>
                                    <td>susanta@gmail.com</td>
                                    <td>7925462360</td>
                                    <td>
                                    <a href="view_customer_edit.php"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="view_customer_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Rajib Rawat</td>
                                    <td>Rajib@gmail.com</td>
                                    <td>8569354628</td>
                                    <td>
                                    <a href="view_customer_edit.php"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="view_customer_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Aman Guha</td>
                                    <td>aman@gmail.com</td>
                                    <td>7965354985</td>
                                    <td>
                                    <a href="view_customer_edit.php"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="view_customer_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
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