<?php
session_start ();
//error_reporting(0);

 if(strlen($_SESSION['login'])==""){
	
  header ( 'Location: index.php' );
}
  else
{
include('config/DbFunctions.php');
$obj=new DbFunction();
$rs =$obj->showdept();// for the students criteria
$rs4 =$obj->showdept();//for the courses criteria 
$rs1=$obj->show_session();//for the students criteria




}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Insert Student Grades</title>
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
    <h5>Enter Student Grades</h5> 
  </div>
        </div>
      </div>
      <div class ="row">
      <?php include('sidenav.php');?>
         <!--end of col tag for the sidenav-->
        
 
         <div class ="container ">
         <div class ="card" style="width:50rem;">
         <div class="card-header">
 Course Search Criteria</div>
         <div class ="card-body">
         <form method="POST"  id="formcourse">
         <div class ="form-group row">
         <label for="sessionName" class="col-sm-2 text-right col-form-label">Session:</label>
         <div class="col-sm-2">
         <select name="sessionName"  id="sessionName" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
                          <?php while($res1=$rs1->fetch_object()){?>
                            <option VALUE=<?php echo htmlentities($res1->seid);?>><?php echo htmlentities($res1->sessioname);?></option>
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
         
         
         
         
        
         <label for="classtype" class="col-sm-2 text-right col-form-label">Class:</label>
         <div class="col-sm-2">
         <select name="classtype1"  id="classtype1" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
         <option value="ND">ND</option>
         <option value="HND">HND</option>
                            
         </select>
         </div>
         </div>
         <div class ="form-group row">
         <label for="level" class="col-sm-2  col-form-label text-right">Level:</label>
         <div class="col-sm-2">
         <select name="glevel1"  id="glevel1" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
         <option value="1">1</option>
           <option value="2">2</option>
          <option value="3">3</option>
                            </select>
         
         </div>                
         <label for="semester1" class="col-sm-2  text-right col-form-label">Semester:</label>
         <div class="col-sm-2">
         <select name="semester1"  id="semester1" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
         <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
         </select>
         </div>
         <label for="courses" class="col-sm-2  text-right col-form-label">Course:</label>
         <div class="col-sm-2">
         <select name="courses"  id="courses" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
         
         </select>
         </div>
         </div>
         <div class ="form-group row">
         <div class ="col-md-3 offset-md-5">
                        <button type="submit" name="course" class="clickbtn" id="btnLogin">Display</button>
                      </div>
                      </div>
                    
        
           
         
         
         </div>
         <!--fixing the search criteria here-->
         </div>
         </div>
        
        <!--end of inner container tag --> 
        </div>
        </div>
        </div>
        
 <!--end of row tag for sidenav-->
 <div class ="row">
 <div class ='col-md-3 offset-md-2'>
 <div class ="mt-5 container">
 <div class ="card" style ="width: 50rem;">
 
 <div class="card-header">
 Registered Student Course</div>
 <div class ="card-body">
 <div class ="form-group row">
 <label for="Student" class="col-sm-2  text-right col-form-label">Student:</label>
 <div class="col-sm-7">
         <select name="fullname"  id="fullname" class="custom-select my-1 mr-sm-2"> 
         <option value =""disabled selected>Select</option>
          
         </select>
         </div>
    </div>     
         </div>
        
 

 </div>
 <!--end of card-body tag-->
 </div>
  <!--end of card tag for the course search-->
 </div>
 <!--end of container tag for the course search-->
 </div>
 <!--end of col--tag for the course search-->
 </div >
 <!--end of row tag for the course search-->
 
        
        </div>
        <!--end of row2 tag-->
        <div class="row">
        <div class='col-md-3 offset-md-2'>
        <div class ="mt-5 container">
        <div class="card" style ="width: 50rem;">
        <div class="card-header">Grades Section</div>
        <div class="card-body">
      <div class="form-group row">
      <label for="score" class="col-sm-2  text-right col-form-label">Score:</label>
      <input type="text" class="col-sm-1 form-control" id="score">
      <label for="grade" class="col-sm-2  text-right col-form-label">Grade:</label>
      <input type="text" class="col-sm-1 form-control" id="grade" readonly>
      <label for="creditunit" class="col-sm-2  text-right col-form-label">Credit Unit:</label>
      <input type="text" class="col-sm-1 form-control" id="creditunit" readonly>
      </div>
      </div> 
      <div class="form-group row">
      <label for="creditpoint" class="col-sm-2  text-right col-form-label">Credit Pt:</label>
      <input type="text" class="col-sm-1 form-control" id="creditpoint" readonly>
      <label for="gradept" class="col-sm-2  text-right col-form-label">Grade Pt:</label>
      <input type="text" class="col-sm-1 form-control" name="gradept" id="gradept" readonly>
      <label for="remark" class="col-sm-2  text-right col-form-label">Remark:</label>
      <input type="text" class="col-sm-2 form-control" name="remark" id="remark" readonly>
      </div>
      <div class ="form-group row">
         <div class ="col-md-3 offset-md-5">
                        <button type="submit" name="btnsave" class="clickbtn" id="btnsave">Save</button>
                        <span id="savealert"></span>
                      </div>
                      </div>
                    
        </div>
        </div>
         <!--end of tag for card body tag-->
        </div>
      <!--end of tag for card names tag-->
        </div>
         <!--end of tag for container names tag-->
        </div>
    <!--end of col3 for course course names tag-->
        </div>
        <!--end of row 3 course names tag-->
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
          
            <?php include('js/grade.js');?>
                    
</body>
</html>