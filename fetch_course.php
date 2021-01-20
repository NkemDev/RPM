<?php
require 'config/DB.php';
$output ='';
$glevel =$_POST['glevel'];
$semester1=$_POST['semester1'];
$dept =$_POST['department'];
$ClassType=$_POST['classT'];
//$query ="SELECT * FROM student_tbl WHERE glevel ='".$_POST['glevel']."' AND seid ='".$_POST['sessionN']."'AND did='".$_POST['department']."' AND class_type='".$_POST['classType']."' ORDER BY matric_no ";
$query = "SELECT * FROM course_tbl where did='".$dept."'AND classtype ='".$ClassType."' AND glevel='".$glevel."' AND semester='".$semester1."' order by cid";
$result= mysqli_query($mysqli,$query);
$output .= "<option value ='' disabled selected> Selectme </option>";
while ($row = mysqli_fetch_array($result)){
    $output .='<option value="'.$row["cid"].'">'.$row["courseCode"].'</option>';

}
echo $output;



?>