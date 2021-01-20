<?php
include('gpaProcessor.php');
if(isset($_POST))
{
    
    extract($_POST);
     $result = array();
     //$session1=array();
    $courseList = getCourses($deptcode,$classtype1,$glevel1,$semester1);
    $studentList = getSudents($glevel1,$sessionName,$deptcode,$classtype1);
    $session1 = getsession($sessionName);
    $dept = getdeptName($deptcode);
    $type =getclasstypelevel($glevel1,$classtype1,$semester1);
    $semester= getsemester($semester1);
    foreach($studentList as $sl)
    {
        $singleStudent =array();
        $stdCourse = array();
        $singleStudent['matric_no'] = $sl['matric_no'];
        $singleStudent['fullname'] = $sl['surname'].', '.$sl['firstName'].' '.$sl['middleName'];
        $stdCours = array();
        $stdgrade=array();
        foreach($courseList as $cl)
        {
           
           $cid =  $cl["cid"];
           $stdCours[] = getSingleStudentSingleScore($cid,$sessionName, $sl['stid'],$semester1);
          // $stdgrade[] = getSingleStudentSinglegrade($cid,$sessionName, $sl['stid'],$semester1);
        } 
             
            $singleStudent['std_gpa'] =    getSingleStudentSinglGPA ($cid,$sessionName,$sl['stid'],$semester1);
           $singleStudent['stdCourse'] = $stdCours;
           
          $result[] = $singleStudent;


    }

     
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>View Student Results</title>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    
    
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <style>
    body{font-size:10px;}
    h3{line-height: 0.5px; }
   table,td,tr {border:1px solid black;
   border-collapse:collapse;
   table-layout:auto;}
    </style>
   
 </head>   
<body>
<br>
<h3 >FEDERAL COLLEGE OF FORESTRY MECHANIZATION AFAKA</h3>
<h3> <?php echo $session1; echo ' ACADEMIC SESSION'; ?></h3>
<h3> <?php echo $dept; echo ' DEPARTMENT'; ?></h3>
<h3> <?php echo $type; ?></h3>
<h3> <?php echo $semester; echo" SEMESTER EXAMINATION RESULT"; ?></h3>
<table>

<tr>
<td>S/N</td>
<td>Reg No</td>
<td>Full Name</td> 


<?php foreach($courseList as $c){?>

<td><?php echo ($c['courseCode']); ?></td>

<?php }?>
<td> CGP</td>
<td> Remarks</td>
<td> Carry Over</td>
</tr>

<?php 
$count = 1;
foreach($result as $r) { //var_dump($r);//exit;?>
<tr >
<td ><?php echo $count++; ?></td>
<td ><?php echo $r['matric_no']; ?></td>
<td><?php echo $r['fullname']; ?></td>


<?php 
foreach($r['stdCourse'] as $course){?>
<td> <?php echo $course; ?></td>

<?php 

}


?>
<?php 
foreach($r['std_gpa'] as $gpa){?>
<td > <?php echo $gpa['gpa']; ?></td>
<td > <?php echo $gpa['remarks']; ?></td>
<td > <?php echo $gpa['carryover']; ?></td>


 <?php }?>


</tr>




<?php  }?>

</table>
<br>
<br>
<div class="container">
<p>Academic Officer's Signature ___________________ Date _____________  Provost's Signature ___________________ Date _____________  Registrar's Signature  ___________________  Date _____________</p></div>

<script src='js/jquery-3.5.1.min.js'></script>
             <!--bootstrap javascript file-->  
            <script src='js/bootstrap.min.js'></script>
          
</body>
</html>