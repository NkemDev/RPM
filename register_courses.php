<?php
session_start ();
error_reporting(0);

 if(strlen($_SESSION['login'])==""){
	
	header ( 'Location: index.php' );
}
include('config/DbFunctions.php');
$obj=new DbFunction();
$rs =$obj->showdept();// for the students criteria
$rs4 =$obj->showdept();//for the courses criteria 
$rs1=$obj->show_session();//for the students criteria
$rs2=$obj->show_student2();




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Student Search</title>
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
    <h5>Student Search</h5> 
  </div>
        </div>
      </div>
      <div class ="row">
      <?php include('sidenav.php');?>
         
         <div class ="container ">
         <div class ="card" style="width:50rem;">
         <div class="card-header">
 Student Search Criteria</div>
         <div class ="card-body">
         <form method ="POST">
         <div class ="form-group row">
         <label for="sessionName" class="col-sm-2 text-right col-form-label">Session:</label>
         <div class="col-sm-2">
         <select name="sessionName"  id="sessionName" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
                          <?php while($res1=$rs1->fetch_object()){?>
                            <option VALUE="<?php echo htmlentities($res1->seid);?>"><?php echo htmlentities($res1->sessioname);?></option>
                                <?php }//This is for the drop down from the session database?> 
                            </select>
         </div>
         <label for="Department" class="col-sm-2 text-right col-form-label">Department:</label>
         <div class="col-sm-2">
         <select name="deptcode"  id="Department" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
                          <?php while($res=$rs->fetch_object()){?>
                          <option VALUE="<?php echo htmlentities($res->did);?>"><?php echo htmlentities($res->deptcode);?></option>
                                <?php }//This is the drop down for the dept database?> 
                            </select>
         </div>
         <label for="Semester" class="col-sm-2  text-right col-form-label">Semester:</label>
         <div class="col-sm-2">
         <select name="semester"  id="semester" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
         <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
         </select>
         
         </div>
         </div>
         <div class ="form-group row">
         <label for="classtype" class="col-sm-2 text-right col-form-label">Class:</label>
         <div class="col-sm-2">
         <select name="classtype"  id="classtype" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
         <option value="ND">ND</option>
         <option value="HND">HND</option>
                            
         </select>
         </div>
         <label for="level" class="col-sm-2  col-form-label text-right">Level:</label>
         <div class="col-sm-2">
         <select name="glevel"  id="glevel" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
         <option value="1">1</option>
           <option value="2">2</option>
          <option value="3">3</option>
                            </select>
         
         </div>                
        
         </div>
         <div class ="form-group row">
         <label for="Matric_no" class="col-sm-3  col-form-label text-right">Registration Number:</label>
         <div class="col-sm-5">
         <select name="matricNo"  id="Matric_no" class="custom-select my-1 mr-sm-2"> 
         <option value =""disabled selected>Select</option>
          
         </select>
         </div>  
         </div>  
         <div class ="form-group row">            
         <label for="fullName" class="col-sm-3 text-right col-form-label">Name:</label>
         <div class="col-sm-6">
         <input name="fullName"  id="fullName" class="form-control" type="text"> 
         
         </div>
         </div>
         <div class ="col-md-3 offset-md-4">
                        <button type="submit" name="Courses" class="clickbtn  " id="btnLogin">SEARCH</button>
                      </div>
         </div>
         <!--fixing the search criteria here-->
         </div>
         </div>
        
        <!--end of inner container tag --> 
        </div>
 <!--end of row tag for sidenav-->
 
 <!--end of row tag for the course search-->
 
        <!--end of row2 tag-->
         </form> 
       
      
        
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
           

            <!--jquery file-->
                <script src='js/jquery-3.5.1.min.js'></script>
             <!--bootstrap javascript file-->  
            <script src='js/bootstrap.min.js'></script>
          
            <?php include('js/ajax.js');?>
                    
</body>
</html>