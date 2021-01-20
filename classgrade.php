<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Search Result for Class</title>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
 </head>   
<body>
<?php
//error_reporting(0);
  require 'config/DB.php';
//if(isset($_POST["sessionName"],$_POST["deptcode"],$_POST["classtype1"],$_POST["glevel"],$_POST["semester1"])){
    //var_dump($_POST[]);
    $sessionName =$_POST["sessionName"];
    $deptcode= $_POST["deptcode"];
    $classtype=$_POST["classtype1"];
    $glevel = $_POST["glevel1"];
    $semester =$_POST["semester1"];

  
    $resultsession = "SELECT * from session_tbl where seid = " .$sessionName. "";
    $result1= mysqli_query($mysqli,$resultsession);// to display session
    $rowsession = mysqli_fetch_assoc($result1);
    $resultdeptcode ="SELECT * from dept_tbl where did = " .$deptcode. "";
    $result2= mysqli_query($mysqli,$resultdeptcode);// to display department
    $rowdeptcode = mysqli_fetch_assoc($result2);
    
   if ($classtype == "ND"){
        $type ="National Diploma";
    }
    
       else{
       $type = "Higher National Diploma";
  }
  echo "<br/>";
  echo $type;
  echo "<br>";
  echo "Federal College of Forestry Mechanization Afaka Kaduna ";
  echo "<br>";
  echo $semester." Semester ".$rowsession['sessioname']." Examination Results";
  echo "<br>";
  echo $rowdeptcode["deptname"];
  echo "<br>";
  echo $classtype;
  echo $glevel;
  

//}

?>
</body>
</html>