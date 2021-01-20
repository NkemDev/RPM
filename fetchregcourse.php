<?php
require 'config/DB.php';
$output ='';
//$glevel =$_POST['glevel'];
//$sessionName=$_POST['sessionN'];
//$dept =$_POST['department'];
//$ClassType=$_POST['classType'];
$query ="SELECT * FROM course_tbl WHERE did='".$_POST['department']."' AND classtype='".$_POST['classType']."' AND glevel ='".$_POST['glevel']."' AND semester ='".$_POST['Semester']."'";
$result= mysqli_query($mysqli,$query);
$output .= "<option value ='' disabled selected> Selectme </option>";
while ($row = mysqli_fetch_array($result)){
    $output .='<option value="'.$row["cid"].'">'.$row["courseCode"].'</option>';

}
echo $output;



?>