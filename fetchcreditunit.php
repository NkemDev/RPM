<?php
require 'config/DB.php';

//$glevel =$_POST['glevel'];
//$sessionName=$_POST['sessionN'];
//$dept =$_POST['department'];
//$ClassType=$_POST['classType'];
$query ="SELECT * From course_tbl where cid='".$_POST['Course']."' AND did ='".$_POST['deptcode']."' " ;
$result= mysqli_query($mysqli,$query);


while ($row = mysqli_fetch_array($result)){
   echo ''.$row["creditunit"].'' ;

}




?>