<?php
//session_start();
error_reporting(E_ERROR | E_PARSE);

?>
 <script>
        $(document).ready(function(){
            $("#qnt").change(function(){
                var wd=$("#qnt").val();
                $.ajax({
                    type:"GET",
                    url:"create_order_view_update.php",
                    data:{quantity:wd},
                    success:function(data){
                        $("#head3").html(data);
                    }
                })
            })
        })
</script>
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
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        $total_price=0;
                        $sno=1;
                        foreach($_SESSION as $values)
                        {
                            $p=0;
                            $q=0;
                            //print_r($values);
                            echo '<tr>';
                            echo "<td>".$sno++."</td>";
                            echo "<form action='create_order_view_update.php' method='POST'>";
                            foreach($values as $key=>$value)
                            {
                                if($key==1){
                                    echo "<input type='hidden' name='name$key' value='".$value."'>";
                                    echo "<td>".$value."</td>";//product name
                                }
                                else if($key==2){
                                    echo "<input type='hidden' name='name$key' value='".$value."'>";
                                    echo "<td>".$value."</td>";//product price
                                    $p=$value;
                                }
                                else if($key==3){
                                    echo "<td> <div class='input-group'>
                                    <input type='button' class='btn btn-secondary' value='-'>
                                    <input type='number' id='qnt' name='name$key'  value=".$value." style='width:60px;'>
                                    <input type='button' class='btn btn-secondary' value='+'>
                                    </div></td>"; //quantity
                                    $q=$value;
                                }
                            }
                            $bill=$p*$q;
                            echo "<td>".$bill."</td>";
                            echo "<td>
                            <input type='submit' name='event' value='Update'  class='btn btn-danger'>
                            <input type='submit' name='event' value='Delete'  class='btn btn-danger'>
                            </td>";
                            echo "</form>";
                            echo "</tr>";

                        }
                        
                        // <a href='view_product_delete.php'><button type='button' class='btn btn-danger'>Delete</button></a>
                        
                        // <td>Anmol Cake</td>
                        // <td>160</td>
                        // <td>
                        // <div class="input-group">
                        // <input type="button" class="btn btn-secondary" value="-">
                        // <input type="number" value="1" style="width:60px;">
                        // <input type="button" class="btn btn-secondary" value="+">
                        // </div>
                                        
                        // </td>
                        // <td>320</td>
                                            
                        // <td>
                                                
                        // <a href="view_product_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
                        // </td>
                        // </tr>
                                        
                                    
                       ?>             
                    </tbody>
                </table>
                
                                
                <div class="row">
                    <div class="mb-3 mt-1 col-xl-3 ">
                        <label for="pay_nm" class="form-label basic_font">Payment Mode :</label>
                        <select name="pay_method" id="pay_nm" class="form-control">
                        <option value="">--Select Payment--</option>
                        <option value="cash">Cash Payment</option>
                        <option value="card">Card Payment</option>
                        </select>
                        <!-- <input type="text" class="form-control" name="admin_Name" id="pay_nm" placeholder="Cash/Card"> -->
                    </div>
                                        
                    <div class="mb-3 mt-1 col-xl-3 ">
                        <label for="phn_no" class="form-label basic_font">Phone Number :</label>
                        <input type="text" class="form-control" name="phn_no" id="phn_no">
                    </div>
                                        
                    <div class="mb-3 mt-1 col-xl-3 ord_place mt-4 pt-2">
                        <button type="button" class="btn btn-primary proceedtopay">Proceed to Place Order</button>
                    </div>
                </div>
                                
            </div>
        </div>
    </div>
                        
</div>
<?php
header("Location:create_order.php");
?>