<?php
session_start ();
error_reporting(0);

 if(strlen($_SESSION['login'])==""){
	
	header ( 'Location: index.php' );
}
include('config/DbFunctions.php');
$obj=new DbFunction();
$rs=$obj->show_session();
if(isset($_GET['del'])){
	

    $obj->del_session(intval($_GET['del']));

 


}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Manage Sessions</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
 
    <link rel='stylesheet'type ='text/css' media='screen' href='css/dataTables.bootstrap4.min.css'>
    <link rel='stylesheet'type ='text/css' media='screen' href ='css/responsive.dataTables.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='fontawesome-free-5.13.0-web/css/all.css'>
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
    <h5>MANAGE SCHOOL SESSIONS</h5> 
  </div>
        </div>
      </div>
      <div class ="row">
      <?php include('sidenav.php');?>
         <div class="container main">
        <div class="card" style='width:40rem;'>
            <div class ="card-body">
             <div class="dataTable_wrapper">
             <table class="table table-striped table-bordered" id="example">
             <thead>
                                        <tr>
                                            <th>S/No</th>
                                            <th>Session Name</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php 
     $sn=1;
 while($res=$rs->fetch_object()){?>	
    <tr class="odd gradeX">
        <td><?php echo $sn?></td>
        <td><?php echo htmlentities( strtoupper($res->sessioname));?></td>
       
         <td>&nbsp;&nbsp;<a href="edit_session.php?seid=<?php echo htmlentities($res->seid);?>"><i class="fas fa-edit"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <a href="manage_session.php?del=<?php echo htmlentities($res->seid); ?>"> <i class="fas fa-cut"></i></td></a>
        
    </tr>
    
<?php $sn++;}?>   	           
</tbody>
             </table>
             </div>
            </div>
            <!--end of card-body tag-->
        </div>
        <!--end of card tag-->
         </div>
         <!--end of container tag-->
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
<!--jquery --->
<script src='js/jquery-3.5.1.min.js'></script>
   <!--bootstrap javascript --->         
        <script src='js/bootstrap.min.js'></script>
        <!--datatable javascript ---> 
        <script src='js/jquery.dataTables.min.js'></script>
        <script src ='js/dataTables.bootstrap4.min.js'></script> 
         <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );

    </script>
</body>
</html>