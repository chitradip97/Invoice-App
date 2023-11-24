<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <!-- <link href="css/styles.css" rel="stylesheet" /> -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- <script src="js/scripts.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#login_btn').click(function(){
                    //console.log("ajax") ;
                    var email=$('#inputEmail').val();
                    var pass=$('#inputPassword').val();
                    var login_auth=$("input[name=login_authorization]:checked").val();
                   // console.log(email) ;
                    console.log(login_auth) ;
                    $.ajax({
                        type:"POST",
                        url:"login_backend.php",
                        data:{log_btn:"log",em:email,password:pass,login:login_auth},
                        success:function(response)
                        {   console.log(response);
                            var res=JSON.parse(response) ;
                            console.log(res);
                            if(res.status==200)
                            {
                                window.location.href= "dashboard.php";
                            }
                            else if (res.status==402)
                            {
                                $('#alert').html("<div class='alert alert-danger'><strong>Error!</strong>Password Missmatch.</div>"); 
                            }
                            else if (res.status==404)
                            {
                                $('#alert').html("<div class='alert alert-danger'><strong>Error!</strong> Empty credential at email or password.</div>");
                            }
                            
                        }
                    })
                })
            })


                

        </script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-floating mb-3" id='alert'>

                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <h5>Login as:</h5>
                                            <!-- <label for="html">Admin</label> -->
                                            admin
                                            <input type="radio" id="Admin" name="login_authorization" value="Admin">
                                            <!-- <label for="css">User</label> -->
                                            user
                                            <input type="radio" id="User" name="login_authorization" value="User">
                                            
                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> -->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="login_pass_recovery.php">Forgot Password?</a>
                                                <!-- <a class="btn btn-primary" href="index.html">Login</a> -->
                                                <input type="button" class="btn btn-primary" id="login_btn" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-5">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> -->
        </div>
        
    </body>
</html>
