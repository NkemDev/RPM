
<?php 
session_start();
if(isset($_POST['submit'])){
	
	 include('config/DbFunctions.php');
	 $obj=new DbFunction();
	 $_SESSION['login']=$_POST['uname'];
	 $obj->login($_POST['uname'],$_POST['pwd']);
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>login page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css '>
  <style>
      body{
          background-image: url('pics/background_login.jpg');
          background-repeat:no-repeat;
      }
  </style> 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom bg-custom">
        <div class=" pt-2 pb-2">
            <a href="/" class="navbar-brand"><img src="pics/frin_logo.png" class="img-fluid" alt="logo" width="120px" height="120px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            
        </div>
        </nav>
        <div class="row">
            <div class="col-md-5 mx-auto">

                <!-- form card login -->
                <div class="card bg-light mb-3" style="max-width: 26rem;">
                    <div class="card-header"><h3>Login</h3>
                        
                    </div>
                    <div class="card-body">
                        <form  method="POST">
                            <div class="form-group">
                                <label for="uname1">Username:</label>
                                <input type="text" class="form-control" name="uname" id="uname1" required="">
                                
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="pwd" class="form-control" id="pwd1" required="" autocomplete="new-password">
                                <div class="invalid-feedback">Enter your password too!</div>
                            </div>
                           
                            <button type="submit" name="submit" class="btn btn-success btn-md float-right" id="btnLogin">Login</button>
                        </form>
                        
                    </div>
                    <div class="card-footer text-muted text-center">
                        &copy;Dynax Technologies 2020   
                    
                      </div>
                    <!--/card-block-->
                </div>
                <!-- /form card login -->

            </div>


        </div>


        <script src='js/jquery-3.5.1.min.js'></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script type = "text/javascript">
    jQuery(function(){
                jQuery("#uname").validate({
                    expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
                    message: "Should be a valid Username"
                });
                jQuery("#pwd").validate({
                    expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
                    message: "Should be a valid password"
                });
                
            });
            </script>
</body>
</html>