<?php
session_start();
?>
<?php
include('includes/header_file.php');
?>

<div class="modal fade" id="add_customer_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label >Enter Customer Name</label>
            <input type="text" class="form-control" id="c_name">
        </div>
        <div class="mb-3">
            <label >Enter Customer Phone no</label>
            <input type="text" class="form-control" id="c_phone">
        </div>
        <div class="mb-3">
            <label >Enter Customer Email (optional)</label>
            <input type="text" class="form-control" id="c_email">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_customer">Save changes</button>
      </div>
    </div>
  </div>
</div>


 <!-- Content Area-->
 <div class="content_footer">
            <!-- Body Area -->
            <div class="content_section">
                <div class="container-fluid">
                <!-- add admin -->
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                        <div class="card  mb-4 ">
                            <div class="card-footer"> <h5 class="basic_font">Create Order</h5> </div>
                            <div class="card-body">
                                <form action="create_order_backend.php" method="POST">
                                    <div class="row">
                                    <div class="mb-3 mt-1 col-xl-3 ">
                                    <label for="product_nm" class="form-label basic_font">Product Name :</label>
                                    <select class="form-control cat_nm" name="prod_cred" id="product_nm">
                                    <option value="">--select--</option>
                                    <?php
                                include ("database_connection.php");
                                $insertobj=new Dataquery();
                                $result=$insertobj->getdata('*','product',' ');
                                if(isset($result[0]))
                                {
                                    foreach($result as $list)
                                    {
                                        ?>
                                        <tr>
                                        <option value="<?php echo $list['product_id'] ?>"><?php echo $list['product_name'] ?></option>
                                        </tr>
                                        <?php
                                    }
                                }
                                            else{
                                                echo "<td colspan='6' align='center'>No Record Found</td>";
                                            }
                                        ?>
                                </select>

                                    <!-- <input type="text" class="form-control" name="product_name" id="product_nm" placeholder="Enter Product name"> -->
                                    </div>
                                    <div class="mb-3 mt-1 col-xl-3 d-">
                                    <label for="quantity" class="form-label basic_font">Quantity :</label>
                                    <div class="d-flex">
                                    <input type="number" class="form-control" name="quantity" id="quantity" >
                                    <input type="submit" name="add_btn" value="ADD" class="btn btn-primary">
                                    <!-- <a href="#"><button type="button" class="btn btn-primary">Add</button></a> -->
                                    </div>
                                    </div>
                                    </div>
                                    
                                    <!-- <input type="submit" class="btn btn-primary" name="admin_add_btn" value="ADD"> -->
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- add user -->
                    <?php
                    //if( empty(session_id()) && !headers_sent()){
                        //session_start();
                        // if (isset($_SESSION['product_items']))
                    //  {
                        //print_r($_SESSION['product_items']);
                    //  }
                    //}
                    // if (session_status() !== PHP_SESSION_ACTIVE){
                        // session_start();
                        //  if (isset($_SESSION['product_items'])){
                        //     print_r($_SESSION['product_items']);
                        //  }
                        
                    // }
                   // session_start();
                     
                    
                    ?>
                    <!-- <div class="row">
                        <div class="col-xl-12 col-md-12">
                        <div class="card  ">
                            <div class="card-footer"> <h5 class="basic_font">Product List :</h5> </div>
                            <div class="card-body ">
                                
                                            
                                    <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Product NAME</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Anmol Cake</td>
                                        <td>160</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="button" class="btn btn-secondary" value="-">
                                                <input type="number" value="1" style="width:60px;">
                                                <input type="button" class="btn btn-secondary" value="+">
                                            </div>
                                        
                                        </td>
                                        <td>320</td>
                                        
                                        <td>
                                            
                                            <a href="view_product_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                    
                                
                                
                                    </tbody>
                                    </table>
                                
                                <div class="row">
                                    <div class="mb-3 mt-1 col-xl-3 ">
                                        <label for="pay_nm" class="form-label basic_font">Payment Mode :</label>
                                        <input type="text" class="form-control" name="admin_Name" id="pay_nm" placeholder="Cash/Card">
                                    </div>
                                    
                                    <div class="mb-3 mt-1 col-xl-3 ">
                                        <label for="phn_no" class="form-label basic_font">Phone Number :</label>
                                        <input type="number" class="form-control" name="phn_no" id="phn_no">
                                    </div>
                                    
                                    <div class="mb-3 mt-1 col-xl-3 ord_place mt-4 pt-2">
                                        <a href=""><button type="button" class="btn btn-primary">Proceed to Place Order</button></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        </div>
                        
                    </div> -->
                    <?php
                     include("create_order_view.php");   
                    ?>
                </div>
            </div>


                               
                                
                                         


                                
                            
                   
                
               
           

<?php
include('includes/footer.php');
?>