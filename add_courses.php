<?php
session_start ();
error_reporting(0);
include('config/DbFunctions.php');
$obj=new DbFunction();
$rs =$obj->showdept();
 if(strlen($_SESSION['login'])==""){
	
	header ( 'Location: index.php' );
}
else{
if(isset($_POST['submit'])){
	

	$obj=new DbFunction();
  $obj->create_course($_POST['courseName'],$_POST['courseCode'],$_POST['deptcode'],$_POST['creditUnit'],$_POST['classtype'],$_POST['gradeLevel'],$_POST['semester']);

}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Add Courses</title>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    
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
    <h5>ADD COURSES</h5> 
  </div>
        </div>
      </div>
      <div class ="row">
      <?php include('sidenav.php');?>
         <!--end of col tag for the sidenav-->
         <div class ="container main">
             <div class ="card" style="width:50rem;">
                <div class="card-body">
                  <form method="POST">
                    <div class="form-group row">
                        <label for="CourseName" class="col-sm-2 col-form-label">Course Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="CourseName" name="courseName" required>
                            </div> 
                    </div>
                    <div class="form-group row">
                        <label for="CourseCode" class="col-sm-2 col-form-label">Course Code:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="CourseCode" name="courseCode">
                            </div>
                            <label for="Dept" class="col-sm-2 col-form-label">Dept Code:</label>
                        <div class="col-sm-3">
                            <select class="custom-select my-1 mr-sm-2" id="Dept" name="deptcode">
                              <option value ="">Select</option>
                              <?php while($res=$rs->fetch_object()){?>
                                <option VALUE="<?php echo htmlentities($res->did);?>"><?php echo htmlentities($res->deptcode);?></option>
                                <?php }?> 
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="CreditUnit" class="col-sm-2 col-form-label">Credit Unit:</label>
                            <div class="col-sm-3">
                                <select name="creditUnit" class="custom-select my-1 mr-sm-2" id="CreditUnit">
                                <option value=""> Select</option>
                                <?php for($i = 1;$i<=7; $i++){?>
                                  <option value="<?php echo $i ;?>"><?php echo $i;?></option>
                                <?php  } ?>
                                </select>
                                </div>
                                <label for="Class" class="col-sm-2 col-form-label">Class:</label>
                            <div class="col-sm-3">
                                <select class="custom-select my-1 mr-sm-2" id="Class" name="classtype">
                                    <option value="ND">ND</option>
                                    <option value="HND">HND</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Level" class="col-sm-2 col-form-label">Level:</label>
                                <div class="col-sm-3">
                                    <select name="gradeLevel" class="custom-select my-1 mr-sm-2" id="Level">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    </div>
                                    <label for="Semester" class="col-sm-2 col-form-label">Semester:</label>
                                <div class="col-sm-3">
                                    <select class="custom-select my-1 mr-sm-2" id="Semester" name="semester">
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                    </select>
                                    </div>
                                </div>
                                <div class ="col-md-3 offset-md-4">
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