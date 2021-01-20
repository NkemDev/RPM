<?php 

require 'config/DB.php';

function getSudents($glevel,$sessionN,$department,$classType)
{
    $std_data = array();
    global $mysqli;
    $query ="SELECT * FROM student_tbl WHERE glevel ='".$glevel."' AND seid ='".$sessionN."'AND did='".$department."' AND class_type='".$classType."' ORDER BY matric_no ";
    $result= mysqli_query($mysqli,$query); 
    while ($row = mysqli_fetch_array($result)){
        $std_data[] = $row;
    
    }
    return $std_data;    
}


function getSingleStudentSinglGPA ($cid,$sessionN,$std_id,$semester)
{
$std_data   =array(); 
$studentScore = array();
global $mysqli;
$sql = "SELECT * FROM `students_cgpa`   
WHERE `session_id` = '".$sessionN."' and `std_id` = '".$std_id."'   and  student_semester = '".$semester."'";
///var_dump($sql);
$result= mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
//$row = mysqli_fetch_assoc($result);
//return $row['gpa']; 
while ($row = mysqli_fetch_array($result)){
    $std_data[] = $row;

}
return $std_data;    
}

//}

function getSingleStudentSingleScore ($cid,$sessionN,$std_id,$semester)
{
$result_data=array();  
$studentScore = array();
global $mysqli;
$sql = "SELECT * FROM `score_tbl` left join course_tbl on course_tbl.cid = score_tbl.cid 
WHERE `seid` = '".$sessionN."' and `stid` = '".$std_id."'   and score_tbl.cid = '".$cid."'  and  course_tbl.semester = '".$semester."'";

$result= mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
$row = mysqli_fetch_assoc($result);
$score = $row["score"]; 
$grade =$row["grade"]; 
 $combo= $score.'|'.$grade;
 return $combo;
//$result= mysqli_query($mysqli,$sql); 
 //   while ($row = mysqli_fetch_array($result)){
  //      $result_data[] = $row;
    
 //   }
 //   return $result_data;  
}
//function to get grade for score
function getSingleStudentSinglegrade ($cid,$sessionN,$std_id,$semester)
{
  
$studentScore = array();
global $mysqli;
$sql = "SELECT * FROM `score_tbl` left join course_tbl on course_tbl.cid = score_tbl.cid 
WHERE `seid` = '".$sessionN."' and `stid` = '".$std_id."'   and score_tbl.cid = '".$cid."'  and  course_tbl.semester = '".$semester."'";

$result= mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
$row = mysqli_fetch_assoc($result);
return $row ["grade"]; 
}


function getSingleStudentScore ($sessionN,$std_id,$semester)
{
$result_data=array();
$studentScore = array();
global $mysqli;
$sql = "SELECT * FROM `score_tbl` left join course_tbl on course_tbl.cid = score_tbl.cid 
WHERE `seid` = '".$sessionN."' and `stid` = '".$std_id."'  and  course_tbl.semester = '".$semester."'";

$result= mysqli_query($mysqli,$sql); 
    while ($row = mysqli_fetch_array($result)){
        $result_data[] = $row;
    
    }
    return $result_data;  
}


function getGradeName($gradeScore)
{
    global $mysqli;
    $sql = "SELECT grade_class FROM grade_table 
            WHERE ".$gradeScore." >= grade_lower_scale AND ".$gradeScore." <= grade_upper_scale  ";
    
    $result= mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    $row = mysqli_fetch_assoc($result);
    return $row;



}


 function calculateGPA($StudentResult)
{ 
    global $mysqli;
    $sumcreditScore = 0;
    $sumgradeScore = 0;
    $SingleResult = array();
    $carryOvers = array();
  // $student_level = 0;
   // $deptcode =0;

    foreach($StudentResult as $singleScore)
    {
         $sumcreditScore = $sumcreditScore+$singleScore["creditunit"];
         $sumgradeScore = $sumgradeScore+$singleScore["gradept"];
         if($singleScore["score"]<40)
             {
               $carryOvers[] = $singleScore["courseCode"];
             }
     }

     $GPA = number_format($sumgradeScore/$sumcreditScore,2);
     $gradename = getGradeName($GPA);
     $SingleResult['GPA'] = $GPA;
     $SingleResult['TCU'] = $sumcreditScore;
     $SingleResult['GP'] = $sumgradeScore;
     $SingleResult['GradeName'] = $gradename["grade_class"];
     $SingleResult['carryOvers'] = implode(", ",$carryOvers);
    // $SingleResult['student_level'] = $student_level;
    // $SingleResult['deptcode'] = $deptcode;
     //there is no 


     
     return $SingleResult;

} 

function updateGPA($SingleResult)
{
    global $mysqli;
    extract($SingleResult); 
        $sql1 ="INSERT INTO students_cgpa
                (std_id,gpa,rcu,tcp,remarks,carryover,session_id,student_semester,student_level)
                values('".$stid."','".$GPA."','".$TCU."','".$GP."','".$GradeName."','".$carryOvers."','".$sessionN."','".$semester."','".$student_level."')";

                $query_run = mysqli_query($mysqli,$sql1)or die(mysqli_error($mysqli));
         return $query_run;
}

function getCourses($department,$classType,$glevel,$Semester)
{
   global $mysqli;
   $query ="SELECT * FROM course_tbl WHERE did='".$department."' AND classtype='".$classType."' AND glevel ='".$glevel."' AND semester ='".$Semester."'";
   $result= mysqli_query($mysqli,$query); 
    while ($row = mysqli_fetch_array($result)){
        $result_data[] = $row;    
    }
    return $result_data; 


}
function getsession($sessionN)
{
    global $mysqli;
    $sql ="SELECT * from session_tbl where `seid` = '".$sessionN."'";
    $result= mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    $row = mysqli_fetch_assoc($result);
    return $row["sessioname"];
}
function getdeptName($department){
    global $mysqli;
    $sql = "SELECT * from dept_tbl where did ='".$department."'";
    $result= mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    $row = mysqli_fetch_assoc($result);
    return $row["deptname"];
}
function getclasstypelevel($glevel,$classType,$semester){
    global $mysql;
    if ($classType =="ND"){
        $type = "NATIONAL DIPLOMA";
    
    }
    else{
        $type = "HIGHER NATIONAL DIPLOMA";
    }
    return $type.' ' .$glevel;
    
}
function getsemester($semester){
    return $semester;
}
?>