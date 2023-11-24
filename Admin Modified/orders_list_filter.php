
<?php
include('includes/header_file.php');
?>

<?php
if(isset($_POST['filter_btn']))
{
    $sel_date=$_POST['date'];
    $sel_date_str="'".$sel_date."'";
    include ("database_connection.php");
    $viewobject=new Dataquery();
    $condition=array('order_date'=>$sel_date_str);
    $result=$viewobject->getdata('*','orders',$condition);
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
                        <div class="card-footer ">
                            <div class="row">
                            <div class="col-md-6">
                             <h5 class="basic_font">Order List :</h5>
                             </div>
                             <div class="col-md-6"> 
                             <input type="date" class="date_pic">
                             <a href="orders_list_filter.php"><button type="button" class="btn btn-success">Filter</button></a>
                             <a href="orders_list.php"><button type="button" class="btn btn-danger">Reset</button></a>
                             </div>
                             </div>
                    </div>
                        <div class="card-body ">
                            
                                           
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Order sr. Id</th>
                                    <th>Customer Id.</th>
                                    <th>Tracking no.</th>
                                    <th>Invoice No</th>
                                    <th>Total Amount</th>
                                    <th>Order Date</th>
                                    <th>Payment Status</th>
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
                                    <td><?php echo $list['order_id'];?></td>
                                    <td><?php echo $list['customer_id'];?></td>
                                    <td><?php echo $list['tracking_no'];?></td>
                                    <td><?php echo $list['invoice_no'];?></td>
                                    <td><?php echo $list['total_amount'];?></td>
                                    <td><?php echo $list['order_date'];?></td>
                                    <td><?php echo $list['payment_mode'];?></td>
                                    <td>
                                        <a href="view_customer_edit.php"><button type="button" class="btn btn-info">View</button></a>
                                        <a href="view_customer_delete.php"><button type="button" class="btn btn-primary">Print</button></a>
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
                                    <td>65321498</td>
                                    <td>Shusant Khan</td>
                                    <td>7925462360</td>
                                    <td>27/04/23</td>
                                    <td>Cash Payment</td>
                                    <td>
                                    <a href="view_customer_edit.php"><button type="button" class="btn btn-info">View</button></a>
                                    <a href="view_customer_delete.php"><button type="button" class="btn btn-primary">Print</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>65987525</td>
                                    <td>Rajib Rawat</td>
                                    <td>8569354628</td>
                                    <td>28/05/23</td>
                                    <td>Online Payment</td>
                                    <td>
                                    <a href="view_customer_edit.php"><button type="button" class="btn btn-info">View</button></a>
                                    <a href="view_customer_delete.php"><button type="button" class="btn btn-primary">Print</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>6598754836</td>
                                    <td>Aman Guha</td>
                                    <td>7965354985</td>
                                    <td>29/06/23</td>
                                    <td>Cash Payment</td>
                                    <td>
                                    <a href="view_customer_edit.php"><button type="button" class="btn btn-info">View</button></a>
                                    <a href="view_customer_delete.php"><button type="button" class="btn btn-primary">Print</button></a>
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