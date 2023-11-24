
<?php
include('includes/header_file.php');
?>
<script>
$(document).ready(function(){
$("#prod").click(function(){
   // console.log("hello");
    var category_nm=$(".cat_nm").val();
    var prod_nm=$(".prod_nm").val();
    var prod_description=$(".prod_dec").val();
    var prod_price=$(".prod_price").val();
    var prod_qnty=$(".prod_qnty").val();
   
    //console.log(user_id);
    $.ajax({
        type:"POST",
        url:"add_product_backend.php",
        data:{d1:category_nm,d2:prod_nm,d3:prod_description,d4:prod_price,d5:prod_qnty},
        success:function(val){
            $("#alert_contain").html(val);
        }
    });
});
});
</script>



 <!-- Content Area-->
 <div class="content_footer">
            <!-- Body Area -->
            <div class="content_section">
                <div class="container-fluid">
                
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                    <div class="card  mb-4 ">
                        <div class="card-footer"> 
                        <span id="alert_contain"></span>    
                        <h5 class="basic_font">Add Product</h5> 
                        </div>
                        <div class="card-body">
                            <form >
                                <div class="mb-3 mt-1 col-xl-12">
                                <label for="product_category" class="form-label basic_font">Category :</label>
                                <!-- <input type="text" class="form-control cat_nm" name="prod_category" id="product_category" placeholder="Enter your Category name"> -->
                                <select class="form-control cat_nm" name="prod_category" id="product_category">
                                <option value="">--select--</option>
                                <?php
                                include ("database_connection.php");
                                $insertobj=new Dataquery();
                                $result=$insertobj->getdata('category_name','category',' ');
                                if(isset($result[0]))
                                {
                                    foreach($result as $list)
                                    {
                                        ?>
                                        <tr>
                                        <option value="<?php echo $list['category_name'] ?>"><?php echo $list['category_name'] ?></option>
                                        </tr>
                                        <?php
                                    }
                                }
                                            else{
                                                echo "<td colspan='6' align='center'>No Record Found</td>";
                                            }
                                        ?>
                                </select>
                                </div>
                                <div class="mb-3 mt-1">
                                <label for="product_name" class="form-label basic_font">Product :</label>
                                <input type="text" class="form-control prod_nm" name="prod_nm" id="product_name" placeholder="Enter your Product name">
                                </div>
                               
                                <div class="mb-3 mt-1">
                                <label for="product_dec" class="form-label basic_font ">Category Description :</label>
                                <textarea class="form-control prod_dec" placeholder="Enter your Product Descrption" rows="3" id="product_dec" name="description"></textarea>
                                </div>
                                <div class="row mb-3 mt-1"  >
                                    <div class="col-xl-6 col-md-12">
                                        <label for="product_price" class="form-label basic_font ">Price :</label>
                                        <input type="number" class="form-control prod_price" name="prod_price" id="product_price">
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <label for="product_quantity" class="form-label basic_font ">Quantity :</label>
                                        <input type="number" class="form-control prod_qnty" name="prod_quantity" id="product_quantity">
                                    </div>
                                </div>
                                <input type="button" class="btn btn-primary" id="prod" name="Product_add_btn" value="ADD">
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                                         
            </div>


                                
                            
                   
                
               
           

<?php
include('includes/footer.php');
?>