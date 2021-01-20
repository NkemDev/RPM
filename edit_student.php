<?php
session_start ();
error_reporting(0);
include('config/DbFunctions.php');
$obj=new DbFunction();
 if(strlen($_SESSION['login'])==""){
	
	header ( 'Location: index.php' );
}
$id=$_GET['stid'];
    $rs1=$obj->show_session();
    $rs2=$obj->showdept();
    $rs=$obj->show_student1($id);
    $res=$rs->fetch_object(); 


if(isset($_POST['submit'])){
	

 
  $id=$_GET['stid'];
  $obj->edit_student($_POST['surname'],$_POST['firstName'],$_POST['middleName'],$_POST['matricno'],$_POST['deptcode'],$_POST['gclass'],$_POST['glevel'],$_POST['sessionName'],$id);


}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register Student</title>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/fontawesome.min.css'>
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
        <h5>UPDATE STUDENT</h5> 
      </div>
            </div>
          </div>
              <div class ="row">
              <?php include('sidenav.php');?>
              <div class="container main">
                <div class ="card" style="width:50rem;">
                  <div class = "card-body">
                    <form method ="POST">
                    <div class="form-group row">
                        <label for="Surname" class="col-sm-3 col-form-label">Surname:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Surname" name="surname" value="<?php echo $res->surname;?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="FirstName" class="col-sm-3 col-form-label">First Name:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="FirstName" name="firstName" value="<?php echo $res->firstName;?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="MiddleName" class="col-sm-3 col-form-label">MiddleName:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="MiddleName" name="middleName" value="<?php echo $res->middleName;?>">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="MatricNo" class="col-sm-3 col-form-label">Matric No:</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="MatricNo" name="matricno" value="<?php echo $res->matric_no;?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Department" class="col-sm-3 col-form-label">Department:</label>
                        <div class="col-sm-5">
                          <select class="custom-select my-1 mr-sm-2" id="Department" name="deptcode">
                          <?php while($res2=$rs2->fetch_object()){?>
                          <option VALUE="<?php echo htmlentities($res2->did);?>"><?php echo htmlentities($res2->deptcode);?></option>
                                <?php }//This is the drop down for the dept database?> 
                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="class" class="col-sm-3 col-form-label">Class:</label>
                        <div class="col-sm-5">
                          <select class="custom-select my-1 mr-sm-2" name="gclass">
                            <option value="ND">ND</option>
                             <option value="HND">HND</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Level" class="col-sm-3 col-form-label">Level:</label>
                        <div class="col-sm-5">
                          <select class="custom-select my-1 mr-sm-2" name="glevel">
                            <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Session" class="col-sm-3 col-form-label">Session:</label>
                        <div class="col-sm-5">
                          <select class="custom-select my-1 mr-sm-2" id="Session" name="sessionName">
                          <?php while($res1=$rs1->fetch_object()){?>
                            <option VALUE="<?php echo htmlentities($res1->seid);?>"><?php echo htmlentities($res1->sessioname);?></option>
                                <?php }//This is for the drop down from the session database?> 
                            </select>
                        </div>
                      </div>
                     
                      <div class ="col-md-3 offset-md-4">
                        <button type="submit" name="submit" class="clickbtn">UPDATE</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              </div>
                          <!--end of row tag for the sidenav-->
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