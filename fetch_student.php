<?php
require 'config/DB.php';
$output ='';
//$glevel =$_POST['glevel'];
//$sessionName=$_POST['sessionN'];
//$dept =$_POST['department'];
//$ClassType=$_POST['classType'];
$query ="SELECT studentscore_tbl.stid,studentscore_tbl.fullname
 FROM studentscore_tbl
 inner join student_tbl on studentscore_tbl.stid =student_tbl.stid
  WHERE studentscore_tbl.did='".$_POST['deptcode']."' AND studentscore_tbl.seid='".$_POST['sessionName']."' AND studentscore_tbl.cid ='".$_POST['courses']."' ORDER BY student_tbl.matric_no";
$result= mysqli_query($mysqli,$query);
$output .= "<option value ='' disabled selected> Selectme </option>";
while ($row = mysqli_fetch_array($result)){
    $output .='<option value="'.$row["stid"].'">'.$row["fullname"].'</option>';

}
echo $output;



?>