<?php
require 'config/DB.php';
$sessionName =$_POST['sessionName'];
$deptcode=$_POST['Department2'];
$studentid=$_POST['Matric_no'];
$cid=$_POST['course1'];
$fullname=$_POST['fullName'];
// sql statement to insert the data into the database table
$query ="INSERT INTO  studentscore_tbl (seid,did,stid,fullname,cid )VALUES('$sessionName','$deptcode','$studentid','$fullname','$cid')";
$query_run = mysqli_query($mysqli,$query);
if ($query_run)
{
    echo" Course successfully registered";
}
else{
    echo"Course not successfully registered";
}

?>