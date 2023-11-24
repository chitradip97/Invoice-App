<?php
session_start();
?>
<?php
include('includes/header_file.php');
?>
<!-- Content Area-->
<div class="content_footer">
            <!-- Body Area -->
    <div class="content_section">
                
    <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-xl-12 col-md-12"> -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Order Summery
                        <a href="create_order.php" class="btn btn-danger float-end">Back to create order</a></h4>
                    </div>
                    <div class="card-body">
                        
                        <div id="mybilling_area">
                            <?php
                                if(isset($_SESSION['cus_phn']))
                                {
                                    // foreach($_SESSION as $values)
                                    // {
                                    //     print_r($values);
                                    // }
                                    $phone=$_SESSION['cus_phn'];
                                    $invoice_no=$_SESSION['inoice_no'];
                                    include ("database_connection.php");
                                    $insertobj=new Dataquery();
                                    $condition=array("Customer_number"=>$phone);
                                    $result=$insertobj->getdata('*','customer',$condition);
                                    if(isset($result[0]))
                                    {
                                        foreach($result as $list)
                                        {
                            ?>
                            <table class="table table-striped">
                            <tbody>
                                <tr>
                                <td style="text-align:center;" colspan=2>
                                <h4 style="font-size:23px; line-height:30px;margin:2px;padding:0">Company XYZ</h4>
                                <p style="font-size:16px; line-height:24px;margin:2px;padding:0">#555, 1st street</p>
                                <p style="font-size:16px; line-height:24px;margin:2px;padding:0">Company XYZ</p>
                                </td>
                                </tr>
                                <tr>
                                    <td>
                                    <h5 style="font-size:20px; line-height:30px;margin:0px;padding:0">Customer Details:</h5>
                                    <p style="font-size:16px; line-height:20px;margin:0px;padding:0">Customer Name:<?php echo  $list['Customer_name']; ?></p>
                                    <p style="font-size:16px; line-height:20px;margin:0px;padding:0">Customer Phone No:<?php echo $list['Customer_number'];?></p>
                                    <p style="font-size:16px; line-height:20px;margin:0px;padding:0">Customer Email Id:<?php echo $list['Customer_email'];?></p>
                                    </td>
                                    <td align="end">
                                    <h5 style="font-size:20px; line-height:30px;margin:0px;padding:0">Invoice Details:</h5>
                                    <p style="font-size:16px; line-height:20px;margin:0px;padding:0">Invoice No.:<?php echo $invoice_no; ?></p>
                                    <p style="font-size:16px; line-height:20px;margin:0px;padding:0">Invoice Date:<?php echo date('D M Y');
                                    ?></p>
                                    <p style="font-size:16px; line-height:20px;margin:0px;padding:0">Address:1st main road, kolkata,saltlake,700073</p>
                                    </td>    
                                </tr>
                                </tbody>
                                </table>


                                    <?php  
                                          } 
                                         }
                                        }

                                        ?>
                                <!-- bill segment -->
                                <?php
                                    if(isset($_SESSION))
                                    {
                                        ?>
                                        <div class="table-responsive mb-3">
                                         <table>
                                            <thead>
                                                <tr>
                                                    <th align="start" style="border-bottom:1px solid #ccc; width:5%">ID</th>
                                                    <th align="start" style="border-bottom:1px solid #ccc; width:5%">Product Name</th>
                                                    <th align="start" style="border-bottom:1px solid #ccc; width:5%">Price</th>
                                                    <th align="start" style="border-bottom:1px solid #ccc; width:5%">Quantity</th>
                                                    <th align="start" style="border-bottom:1px solid #ccc; width:5%">Total Price</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                    $totalAmount=0;
                                                    $grandtotal=0;
                                                    foreach($_SESSION as $values)
                                                    {
                                                        if(is_array($values)==1){
                                                            //print_r($values);
                                                            //foreach($values as $keys=>$rows)
                                                            //{
                                                                $p=0;
                                                                $q=0;
                                                                // if($keys==2){
                                                                //     $p=$rows;
                                                                // }
                                                                // if($keys==3){
                                                                //     $q=$rows;
                                                                // }
                                                                // $totalAmount +=$p*$q;
                                                                echo "<tr>";
                                                                echo "<td style='border-bottom:1px solid #ccc;'>".$i++."</td>";
                                                                if($values[1]){
                                                                    $product_name=$values[1];
                                                                echo "<td style='border-bottom:1px solid #ccc;'>".$product_name."</td>";  
                                                                }
                                                                if($values[2]){
                                                                    $product_price=$values[2];
                                                                    echo "<td style='border-bottom:1px solid #ccc;'>".$product_price."</td>";
                                                                    $p=$values[2];
                                                                }
                                                                if($values[3]){
                                                                    $product_quantity=$values[3];
                                                                    echo "<td style='border-bottom:1px solid #ccc;'>".$product_quantity."</td>";
                                                                    $q=$values[3];
                                                                }
                                                                $totalAmount =$p*$q;
                                                                echo "<td style='border-bottom:1px solid #ccc;' class='fw-bold'>".$totalAmount."</td>";
                                                                echo "</tr>";
                                                                $grandtotal +=$totalAmount;
                                                            }
                                                        }
                                                            ?>
                                                            <tr class="mt-3">
                                                                <td colspan="4" align="end" style="font-weight: bold; ">Grand Total :</td>
                                                                <td colspan="1" style="font-weight: bold;"><?php echo $grandtotal;
                                                                ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5">Payment Mode: <?php echo $_SESSION['cus_Pay_Mode'];
                                                                ?></td>
                                                            </tr>

                                                            <?php

                                                            $_SESSION['Grand_total_amount']=$grandtotal;
                                                        //}
                                                        
                                                    //}
                                                    //print_r($_SESSION) ;
                                                    
                                                ?>
                                            </tbody>
                                         </table>       
                                        </div>

                                        <?php
                                    }
                                ?>

                        </div>
                        <?php if(isset($_SESSION)) 
                        {?>
                        <div class="mt-4 text-end">
                        <button type="button" class="btn btn-info px-4 mx-1" id="print_btn">Print</button>
                        <!-- <input type="button" class="btn btn-info px-4 mx-1" onclick="printDiv('mybilling_area')" value="Print" /> -->

                        </div>

                        <div class="mt-4 text-end">
                        <button type="button" class="btn btn-primary px-4 mx-1" id="saveorder">Save</button>

                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- </div> -->

            </div>

    </div>
        <?php
        include('includes/footer.php');
        ?>
    </div>
</div>





