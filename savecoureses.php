<div class ="row">
 <div class ='col-md-3 offset-md-2'>
 <div class ="mt-5 container">
 <div class ="card" style ="width: 50rem;">
 
 <div class="card-header">
 Course Search Criteria</div>
 <div class ="card-body">
 
 
 <div class="form-group row">
 <label for="Department2" class="col-sm-2 text-right col-form-label">Department:</label>
         <div class="col-sm-2">
         <select name="deptcode2"  id="Department2" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
                          <?php while($res4=$rs4->fetch_object()){?>
                          <option VALUE="<?php echo htmlentities($res4->did);?>"><?php echo htmlentities($res4->deptcode);?></option>
                                <?php }//This is the drop down for the dept database?> 
                            </select>
         </div>
         <label for="classtype2" class="col-sm-2 text-right col-form-label">Class:</label>
         <div class="col-sm-2">
         <select name="classtype2"  id="classtype2" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
         <option value="ND">ND</option>
         <option value="HND">HND</option>
                            
         </select>
         </div>
         
 </div>
 <div class="form-group row">
 <label for="level2" class="col-sm-2  col-form-label text-right">Level:</label>
         <div class="col-sm-2">
         <select name="glevel2"  id="glevel2" class="custom-select my-1 mr-sm-2" required> 
         <option value =""disabled selected>Select</option>
         <option value="1">1</option>
           <option value="2">2</option>
          <option value="3">3</option>
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
         <div class ="col-md-3 offset-md-4">
                        <button type="submit" name="Courses" class="clickbtn  " id="btnLogin">COURSES</button>
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
 <div class ="row">
 <div class='col-md-3 offset-md-2'>
        <div class =" mt-5   container">
        <div class="card"style ="width: 50rem;">
        <table class="table" id="displayCourse" >
        
      </table>
      <div class ="col-md-3 offset-md-4" id="savecourses">
                        <button type="submit" name="RegisterCourses" class="clickbtn" >SAVE</button>
                      </div> 
      </div>
         
          
        
        
        

        </div>
        <!--end of search container -->
        </div>
        <!--end of col--tag-->
        </div>