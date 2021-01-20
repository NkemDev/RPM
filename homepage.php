<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/fontawesome.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    
  
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom bg-custom">
        <div class=" pt-2 pb-2">
            <a href="homepage.php" class="navbar-brand"><img src="pics/frin_logo.png" class="img-fluid" alt="logo" width="120px" height="120px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            
        </div>
    </nav>
    <div class = "row">
      <div class ="col">
<div class= "lineborder">
  <h3>Welcome Admin!</h3> 
</div>
      </div>
    </div>
        <div class ="row">
        <?php include('sidenav.php');?>
            <div class="container main link">
              <div class="row">
              <div class="col-3">
                <a href="Register_Student.php"><figure><img src="pics/student.png" alt="student" class="rounded-circle" width="100px" height="100px"><figcaption>Register Student</figcaption></figure></a>
              </div>
              <div class ="col-3">
                <a href="add_department.php"><figure><img src="pics/departments.webp" alt="department" class="rounded-circle" width="100px" height="100px"><figcaption>Departments</figcaption></figure></a>
              </div>
              <div class ="col-3">
                <a href="add_courses.php"><figure><img src="pics/courses.png" alt="courses" class="rounded-circle" width="100px" height="100px"><figcaption>Courses</figcaption></figure></a>
              </div>
              </div>
              <div class = "row">
                <div class="col-md-3 offset-md-1">
                  <a href="#registerstudent"><figure><img src="pics/report-card.jpg" alt="Grade" class="rounded-circle" width="100px" height="100px"><figcaption>Grades</figcaption></figure></a>
                </div>
                <div class="col-md-2">
                  <a href="change_password.php"><figure><img src="pics/settings_logo.png" alt="Settings" class="rounded-circle" width="100px" height="100px"><figcaption>Settings</figcaption></figure></a>
                </div>
              </div>
            </div>
        </div>
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
            <script src="js/bootstrap.min.js"></script>    
</body>

</html>