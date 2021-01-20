<?php
require 'config/DB.php';

//$glevel =$_POST['glevel'];
//$sessionName=$_POST['sessionN'];
//$dept =$_POST['department'];
//$ClassType=$_POST['classType'];
$query ="SELECT CONCAT(student_tbl.surname,', ',student_tbl.firstName,' ',student_tbl.middleName)As Display From student_tbl where stid='".$_POST['regNo']."'" ;
$result= mysqli_query($mysqli,$query);


while ($row = mysqli_fetch_array($result)){
   echo ''.$row["Display"].'' ;

}




?>