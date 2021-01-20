<?php
require 'config/DB.php';
$sessionName =$_POST['sessionName'];
$deptcode=$_POST['Department2'];
$studentid=$_POST['fullName'];
$cid=$_POST['courses'];
$Score =$_POST['Score'];
$Grade=$_POST['Grade'];
$CreditUnit=$_POST['CreditUnit'];
$Gradept =$_POST['Gradept'];
$Remark =$_POST['Remark'];
// sql statement to insert the data into the database table
$query ="INSERT INTO  score_tbl (seid,did,stid,cid,score,creditunit,grade,gradept,remark )VALUES('$sessionName','$deptcode','$studentid','$cid','$Score','$CreditUnit','$Grade','$Gradept','$Remark')";
$query_run = mysqli_query($mysqli,$query);
if ($query_run)
{
    echo" Data successfully inserted";
}
else{
    echo"Data not successfully inserted";
}

?>