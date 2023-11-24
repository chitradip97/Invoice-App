
<?php
include('includes/header_file.php');
?>
<script>
$(document).ready(function(){
$("#f1").click(function(){
   // console.log("hello");
    var category_nm=$(".cat_nm").val();
    var desc=$(".cat_dec").val();
   
    //console.log(user_id);
    $.ajax({
        type:"POST",
        url:"add_category_backend.php",
        data:{d1:category_nm,d2:desc},
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
                             <h5 class="basic_font">Add category</h5> </div>
                        <div class="card-body ">
                            <form >
                                <div class="mb-3 mt-1">
                                <label for="category_name" class="form-label basic_font">Category name :</label>
                                <input type="text" class="form-control cat_nm" name="category_nm" id="category_name" placeholder="Enter your Category name">
                                </div>
                               
                                <div class="mb-3 mt-1">
                                <label for="comment" class="form-label basic_font">Category stock :</label>
                                <input type="number" class="form-control cat_dec" name="category_nm" id="comment" placeholder="Enter your Category stock">
                                <!-- <textarea class="" placeholder="Enter your Category Descrption" rows="3" id="" name="desc"></textarea> -->
                                </div>
                                <!-- <input type="submit" class="btn btn-primary" name="caterory_add_btn" value="ADD"> -->
                                <input type="button" class="btn btn-primary" id="f1" name="caterory_add_btn" value="ADD">
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