<?php
session_start ();
error_reporting(0);
include('config/DbFunctions.php');
 if(strlen($_SESSION['login'])==""){
	
	header ( 'Location: index.php' );
}
else{
if(isset($_POST['submit'])){
	

	$obj=new DbFunction();
  $obj->create_session($_POST['session1']);

}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Add Session</title>
   
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
   
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
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
    <div class = "row">
        <div class ="col">
  <div class= "lineborder">
    <h5>ADD SESSION</h5> 
  </div>
        </div>
      </div>
      <div class ="row">
      <?php include('sidenav.php');?>
         <!--end of col tag for the sidenav-->
         <div class="container main">
        <div class="card" style='width:35rem;'>
            <div class ="card-body">
                <form method ="POST">
                    <div class="form-group row">
                        <label for="Session" class="col-sm-2 col-form-label">Session:</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="Session" name="session1" required>
                        </div>
                      </div>
                      <div class ="col-md-3 offset-md-3">
                        <button type="submit" name="submit" class="clickbtn">SAVE</button>
                      </div>
                </form>
            </div>
        </div>
         </div>
         </div>
         <!--end of row tag for sidenav-->
         <div class="row">
            <div class="col">
              <footer>
                <div class="lineborder">
                  &copy;Dynax Technologies 2020   
                </div>
              </footer>
            
          </div>
        </div>
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        
        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var dropdownContent = this.nextElementSibling;
          if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
          } else {
          dropdownContent.style.display = "block";
          }
          });
        }
        </script>
            <script src='js/jquery-3.5.1.min.js'></script>
            <script src='js/popper.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
</body>
</html>