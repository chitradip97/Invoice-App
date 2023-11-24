
<?php
include('includes/header_file.php');
?>
<?php
if(isset($_COOKIE['login_auth']))
{
    if($_COOKIE['login_auth']=='Admin')
    {
?>


<script>
$(document).ready(function(){
$("#admin").click(function(){
   // console.log("hello");
    var a_name=$(".admin_nm").val();
    var a_em=$(".admin_em").val();
    var a_num=$(".admin_num").val();
    
   
    //console.log(user_id);
    $.ajax({
        type:"POST",
        url:"add_authorisation_admin_backend.php",
        data:{d1:a_name,d2:a_em,d3:a_num},
        success:function(val){
            $("#alert_contain").html(val);
        }
    });
});

$("#user").click(function(){
   // console.log("hello");
    var u_name=$(".user_nm").val();
    var u_email=$(".user_em").val();
    var u_num=$(".user_num").val();
    
   
    //console.log(user_id);
    $.ajax({
        type:"POST",
        url:"add_authorisation_user_backend.php",
        data:{d1:u_name,d2:u_email,d3:u_num},
        success:function(val){
            $("#alert_contain_user").html(val);
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
                <!-- add admin -->
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                    <div class="card  mb-4 ">
                        <div class="card-footer">
                        <span id="alert_contain"></span>
                             <h5 class="basic_font">Add Admin</h5>
                             </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                <div class="mb-3 mt-1 col-xl-6 ">
                                <label for="admin_nm" class="form-label basic_font">Admin Name :</label>
                                <input type="text" class="form-control admin_nm" name="admin_Name" id="admin_nm" placeholder="Enter Admin name">
                                </div>
                                <div class="mb-3 mt-1 col-xl-6">
                                <label for="admin_em" class="form-label basic_font">Admin Email :</label>
                                <input type="email" class="form-control admin_em" name="admin_email" id="admin_em" placeholder="Enter Admin email">
                                </div>
                                </div>
                                <div class="row">
                                <div class="mb-3 mt-1 col-xl-6">
                                        <label for="admin_num" class="form-label basic_font">Admin Number :</label>
                                        <input type="text" class="form-control admin_num" name="admin_number" id="admin_num">
                                </div>
                                </div>
                                <input type="button" class="btn btn-primary" id="admin" name="admin_add_btn" value="ADD">
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- add user -->
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                    <div class="card  mb-4 ">
                        <div class="card-footer"> 
                        <span id="alert_contain_user"></span>
                            <h5 class="basic_font">Add User</h5> 
                        </div>
                        <div class="card-body">
                            <form >
                                <div class="row">
                                <div class="mb-3 mt-1 col-xl-6 ">
                                <label for="user_nm" class="form-label basic_font">User Name :</label>
                                <input type="text" class="form-control user_nm" name="user_Name" id="user_nm" placeholder="Enter user name">
                                </div>
                                <div class="mb-3 mt-1 col-xl-6">
                                <label for="user_em" class="form-label basic_font">User Email :</label>
                                <input type="email" class="form-control user_em" name="user_em" id="user_em" placeholder="Enter user email">
                                </div>
                                </div>
                                <div class="row">
                                <div class="mb-3 mt-1 col-xl-6">
                                        <label for="user_num" class="form-label basic_font">User Number :</label>
                                        <input type="number" class="form-control user_num" name="user_number" id="user_num">
                                </div>
                                </div>
                                <input type="button" class="btn btn-primary" id="user" name="user_add_btn" value="ADD">
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>


                               
                                
                                         


<?php
    }
 else{
    ?>
    <div class="content_footer">
        <div class="content_section"> 
            <div class="container-fluid">
                <div class="col-xl-12 col-md-12">
                    <div class="card  mb-4 ">
                        <div class="card-footer">
                            <h5 class="basic_font">Sorry! a user does not have authorization to access this page</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
}
}
?>                               
                            
                   
                
               
           

<?php
include('includes/footer.php');
?>