
<?php
include('includes/header_file.php');
?>

<script>
$(document).ready(function(){
$("#customer").click(function(){
   // console.log("hello");
    var customer_nm=$(".cus_nm").val();
    var customer_em=$(".cus_em").val();
    var customer_num=$(".cus_num").val();
    
   
    //console.log(user_id);
    $.ajax({
        type:"POST",
        url:"add_customer_backend.php",
        data:{d1:customer_nm,d2:customer_em,d3:customer_num},
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
                            <h5 class="basic_font">Add Customer</h5>
                         </div>
                        <div class="card-body">
                            <form >
                                <div class="row">
                                <div class="mb-3 mt-1 col-xl-6 ">
                                <label for="customer_nm" class="form-label basic_font">Customer Name :</label>
                                <input type="text" class="form-control cus_nm" name="customer_name" id="customer_nm" placeholder="Enter Customer name">
                                </div>
                                <div class="mb-3 mt-1 col-xl-6">
                                <label for="customer_em" class="form-label basic_font">Customer Email :</label>
                                <input type="email" class="form-control cus_em" name="customer_email" id="customer_em" placeholder="Enter your customer email">
                                </div>
                                </div>
                                <div class="row">
                                <div class="mb-3 mt-1 col-xl-6">
                                        <label for="Customer_num" class="form-label basic_font">Customer Number :</label>
                                        <input type="text" class="form-control cus_num " name="Customer_number" id="Customer_num">
                                </div>
                                </div>
                                <input type="button" id="customer" class="btn btn-primary" name="customer_add_btn" value="ADD">
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