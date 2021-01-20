<?php
require 'config/DB.php';
$output ='';
//$glevel =$_POST['glevel'];
//$sessionName=$_POST['sessionN'];
//$dept =$_POST['department'];
//$ClassType=$_POST['classType'];
$query ="SELECT * FROM student_tbl WHERE glevel ='".$_POST['glevel']."' AND seid ='".$_POST['sessionN']."'AND did='".$_POST['department']."' AND class_type='".$_POST['classType']."' ORDER BY matric_no ";
$result= mysqli_query($mysqli,$query);
$output .= "<option value ='' disabled selected> Selectme </option>";
while ($row = mysqli_fetch_array($result)){
    $output .='<option value="'.$row["stid"].'">'.$row["matric_no"].'</option>';

}
echo $output;



?>