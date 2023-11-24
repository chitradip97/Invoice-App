
<?php
include('includes/header_file.php');
?>
<?php
include ("database_connection.php");
$viewobjadmin=new Dataquery();
$result=$viewobjadmin->getdata('*','admin'," ");
?>
<?php

$viewobjuser=new Dataquery();
$user_result=$viewobjuser->getdata('*','user_data'," ");
?>

 <!-- Content Area-->
 <div class="content_footer">
            <!-- Body Area -->
            <div class="content_section">
                <div class="container-fluid">
                <!-- Admin list -->
                <div class="row">
                    <div class="col-xl-12 col-md-12 mb-3">
                    <div class="card  ">
                        <div class="card-footer"> <h5 class="basic_font">Admin List :</h5> </div>
                        <div class="card-body ">
                            
                                           
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Admin Id</th>
                                    <th>Admin NAME</th>
                                    <th>Admin Email</th>
                                    <th>Admin Phone</th>
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
                                    <td><?php echo $list['admin_id'];?></td>
                                    <td><?php echo $list['admin_name'];?></td>
                                    <td><?php echo $list['admin_email'];?></td>
                                    <td><?php echo $list['admin_num'];?></td>
                                    <td>
                                        <a href="view_admin_edit.php?id=<?php echo $list['admin_id'];?>"><button type="button" class="btn btn-success">Edit</button></a>
                                        <a href="view_admin_delete.php?id=<?php echo $list['admin_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
                                    <td>Rajasree Sarkar</td>
                                    <td>Rajasree@gmail.com</td>
                                    <td>7925462360</td>
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
                <!-- user list -->
                <div class="row">
                    <div class="col-xl-12 col-md-12 mb-3">
                    <div class="card  ">
                        <div class="card-footer"> <h5 class="basic_font">User List :</h5> </div>
                        <div class="card-body ">
                            
                                           
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>User NAME</th>
                                    <th>User Email</th>
                                    <th>User Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                
                                if(isset($user_result[0]))
                                    {
                                    foreach($user_result as $user_list)
                                    {
                                ?>
                                
                                <tr>
                                    <td><?php echo $user_list['user_id'];?></td>
                                    <td><?php echo $user_list['user_name'];?></td>
                                    <td><?php echo $user_list['user_email'];?></td>
                                    <td><?php echo $user_list['user_num'];?></td>
                                    <td>
                                        <a href="view_User_edit.php?id=<?php echo $user_list['user_id'];?>"><button type="button" class="btn btn-success">Edit</button></a>
                                        <a href="view_User_delete.php?id=<?php echo $user_list['user_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
                                    <td>Akash Ghosh</td>
                                    <td>Akash@gmail.com</td>
                                    <td>7925462360</td>
                                    <td>
                                    <a href="view_User_edit.php"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="view_User_delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
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