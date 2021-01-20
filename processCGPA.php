<?php 
include('gpaProcessor.php');
if($_POST)
{
   extract($_POST);
   $allStudentList = getSudents($glevel,$sessionN,$department,$classType);
   
   foreach($allStudentList as $singleStudent)
   {
       $std_id = $singleStudent['stid'];
       $singleStudentScore = getSingleStudentScore($sessionN,$std_id,$semester);
      // updateGPA($std_GPA_Details); 
       $std_GPA_Details = calculateGPA($singleStudentScore);
       $std_GPA_Details['stid'] = $std_id;
       $std_GPA_Details['sessionN'] = $sessionN;
       $std_GPA_Details['semester'] = $semester;
       $std_GPA_Details['student_level'] = $classType; 
      updateGPA($std_GPA_Details); 
       
   }

   header("Location: /RPM/processresult.php?message=Result Processed");

}