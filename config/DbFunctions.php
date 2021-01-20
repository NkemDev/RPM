<?php
require('Database.php');
//$db = Database::getInstance();
//$mysqli = $db->getConnection();
class DbFunction{
	
	function login($loginid,$password){
	
      if(!ctype_alpha($loginid) || !ctype_alpha($password)){
      	
        echo "<script>alert('Either Username or Password is Missing')</script>";
      
      }		
   else{		
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT username, password FROM login where username=? and password=? ";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
		
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
		
		$stmt->bind_param('ss',$loginid,$password);
		$stmt->execute();
		$stmt -> bind_result($loginid,$password);
		$rs=$stmt->fetch();
		if(!$rs)
		{
			echo "<script>alert('Invalid Details')</script>";
			header('location:index.php');
		}
		else{
			
			header('location:homepage.php');
		}
	}
	
}
	}
	
	




	function create_session($csession){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "insert into session_tbl(sessioname)value(?)";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
	
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
	
		$stmt->bind_param('s',$csession);
		$stmt->execute();
		echo "<script type ='text/Javascript'>alert('Session Added Successfully')</script>";
			
		
	}
}				

function create_dept($deptname,$deptcode){//function to create department
$db = Database::getInstance();
$mysqli = $db->getConnection();
$query = "insert into dept_tbl(deptname,deptcode)values(?,?)";
$stmt= $mysqli->prepare($query);
if(false===$stmt){

	trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
}

else{

	$stmt->bind_param('ss',$deptname,$deptcode);
	$stmt->execute();
	echo "<script>alert('Department Information Added Successfully')
	</script>";
	header("Refresh: 0");
	
}
}
function showdept(){//This is to display the department in the drop down button
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM dept_tbl ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	
function showdept1($id){
	//This is for the edit page to show the department you are editing
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM dept_tbl where did='".$id."'";
		$stmt= $mysqli->query($query);
		return $stmt;
		
	}	
	function edit_dept($deptname,$deptcode,$id){

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		//function to edit the department information
		$query = "update dept_tbl set deptname=?,deptcode=? where did=?";
		$stmt= $mysqli->prepare($query);
		$stmt->bind_param('sss',$deptname,$deptcode,$id);
		$stmt->execute();
		echo '<script> 
		alert("Department Information Updated Successfully")
		</script>';
		header("location:manage_dept.php");
	}
	function del_dept($id){//function to department

		//  echo $id;exit;
		 $db = Database::getInstance();
		 $mysqli = $db->getConnection();
		 $query="delete from dept_tbl where did=?";
		 $stmt= $mysqli->prepare($query);
		 $stmt->bind_param('s',$id);
		 $stmt->execute();
		 echo "<script>alert('Department has been deleted')</script>";
		 header("location:manage_dept.php");
		 exit;
	 }			
function create_course($courseName,$courseCode,$deptcode,$creditUnit,$classUnit,$gLevel,$semester){//function to create department
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "insert into course_tbl(courseName,courseCode,did,creditunit,classtype,glevel,semester)values(?,?,?,?,?,?,?)";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
	
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
	
		$stmt->bind_param('sssssss',$courseName,$courseCode,$deptcode,$creditUnit,$classUnit,$gLevel,$semester);
		$stmt->execute();
		echo "<script>alert('Course Information Added Successfully')
		</script>";
		header("Refresh: 0");
		exit;
		
	}
	}

	function show_courses2()
	{//function to show the session in the drop down buttons 
		// and also in the manage session page
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT course_tbl.courseName,course_tbl.courseCode,dept_tbl.deptcode,course_tbl.creditunit,course_tbl.classtype,course_tbl.glevel,course_tbl.semester
		from course_tbl
		inner join dept_tbl on course_tbl.did=dept_tbl.did";
		$stmt= $mysqli->query($query);
		return $stmt;
	}
	function show_courses(){
		//This is for the edit page to show which course you are editing
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT * FROM course_tbl";
			$stmt= $mysqli->query($query);
			return $stmt;
			
		}	

	function show_courses1($id){
		//This is for the edit page to show which course you are editing
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT * FROM course_tbl where cid='".$id."'";
			$stmt= $mysqli->query($query);
			return $stmt;
			
		}	
		function del_course($id){//function to delete session

			//  echo $id;exit;
			 $db = Database::getInstance();
			 $mysqli = $db->getConnection();
			 $query="DELETE from course_tbl where cid=?";
			 $stmt= $mysqli->prepare($query);
			 $stmt->bind_param('s',$id);
			 $stmt->execute();
			 echo "<script>alert('courses has been deleted')</script>";
			 header("location:manage_courses.php");
		 }
		 function edit_course($courseName,$courseCode,$deptcode,$creditUnit,$classUnit,$gLevel,$semester,$id){

			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			//function to edit the course
			$query = "UPDATE course_tbl set courseName=?,courseCode=?,did=?,creditunit=?,classtype=?,glevel=?,semester=? where cid=?";
			$stmt= $mysqli->prepare($query);
			$stmt->bind_param('ssssssss',$courseName,$courseCode,$deptcode,$creditUnit,$classUnit,$gLevel,$semester,$id);
			$stmt->execute();
			echo '<script> 
			alert("course Updated Successfully")
			</script>';
			header("location:manage_courses.php");
		}
	
	function show_session()
	{//function to show the session in the drop down buttons 
		// and also in the manage session page
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM session_tbl ";
		$stmt= $mysqli->query($query);
		return $stmt;
	}
	function del_session($id){//function to delete session

		//  echo $id;exit;
		 $db = Database::getInstance();
		 $mysqli = $db->getConnection();
		 $query="delete from session_tbl where seid=?";
		 $stmt= $mysqli->prepare($query);
		 $stmt->bind_param('s',$id);
		 $stmt->execute();
		 echo "<script>alert('Session has been deleted')</script>";
		 header("location:manage_session.php");
	 }
	 function show_session1($id){
	//This is for the edit page to show which one you are editing
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM session_tbl where seid='".$id."'";
		$stmt= $mysqli->query($query);
		return $stmt;
		
	}	
	function edit_session($sessioname,$id){

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		//function to edit the session info
		$query = "update session_tbl set sessioname=? where seid=?";
		$stmt= $mysqli->prepare($query);
		$stmt->bind_param('ss',$sessioname,$id);
		$stmt->execute();
		echo '<script> 
		alert("Session Updated Successfully")
		</script>';
		header("location:manage_session.php");
	}
	
	 
	function create_student($surname,$firstName,$middleName,$matric_no,$deptcode,$class_type,$glevel,$sessionName,$cdate){//function to register student
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "insert into student_tbl(surname,firstName,middleName,matric_no,did,class_type,glevel,seid,cdate)values(?,?,?,?,?,?,?,?,?)";
		$stmt= $mysqli->prepare($query);
		if(false===$stmt){
		
			trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
		}
		
		else{
		
			$stmt->bind_param('sssssssss',$surname,$firstName,$middleName,$matric_no,$deptcode,$class_type,$glevel,$sessionName,$cdate);
			$stmt->execute();
			echo "<script>alert('Student Registered Successfully')
			</script>";
			header("Refresh: 0");
			
		}
		}
		function show_student1($id){
			//function to show student in order to edit their information
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT * FROM student_tbl where stid='".$id."'ORDER BY matric_no";
			$stmt= $mysqli->query($query);
			return $stmt;
		}
		function show_student2(){
			//function to show student information in the database
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT * FROM student_tbl ORDER BY matric_no";
			$stmt= $mysqli->query($query);
			return $stmt;
		}
		function show_student(){
			//function to show student information in the database
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT student_tbl.surname,student_tbl.firstName,student_tbl.middleName,student_tbl.matric_no,dept_tbl.deptcode,student_tbl.class_type,student_tbl.glevel,session_tbl.sessioname,student_tbl.cdate
			FROM ((student_tbl
			INNER join dept_tbl on student_tbl.did =dept_tbl.did)
			INNER JOIN session_tbl on student_tbl.seid = session_tbl.seid ) ORDER BY student_tbl.matric_no";
			$stmt= $mysqli->query($query);
			return $stmt;
		}

		function edit_student($surname,$firstName,$middleName,$matric_no,$deptcode,$class_type,$glevel,$sessionName,$id){
			//function to edit the student information
		$db = Database::getInstance();
		$mysqli = $db->getConnection();		
		$query = "update student_tbl set surname=?,firstName=?,middlename=?,matric_no=?,did=?,class_type=?,glevel=?,seid=? where stid=?";
		$stmt= $mysqli->prepare($query);
		$stmt->bind_param('sssssssss',$surname,$firstName,$middleName,$matric_no,$deptcode,$class_type,$glevel,$sessionName,$id);
		$stmt->execute();
		echo '<script> 
		alert("Student information Updated Successfully")
		</script>';
		header("location:manage_student.php");
		}
		function del_student(){
			//  function to delete student information from the database
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query="delete from student_tbl where stid=?";
			$stmt= $mysqli->prepare($query);
			$stmt->bind_param('s',$id);
			$stmt->execute();
			echo "<script>alert('Student Information have been deleted')</script>";
			header("location:manage_student.php");
		}
	function update_password($confirmpassword,$username){//Function to change password of user
		$db =Database::getInstance();
		$mysqli =$db->getConnection();
		$query="Update login set password = ? where username = ?";
			$stmt= $mysqli->prepare($query); 
			if(false===$stmt){
		
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			else{
			$stmt->bind_param('si',$confirmpassword,$username);
			$stmt->execute();
			echo "<script>alert('Password changed successfully')
			</script>";
			header("Refresh: 0");
			}
			
		
	}
	function display_student_courses($dept,$classType,$glevel,$semester){
		//function to display the courses the student will register for
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT * FROM course_tbl where did='".$dept."'AND classtype ='".$classType."' AND glevel='".$glevel."' AND semester='".$semester."' order by cid";
			$stmt= $mysqli->query($query);
			return $stmt;

	}
	function showstudentcoursereg(){
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query="SELECT session_tbl.sessioname,studentscore_tbl.fullname,student_tbl.matric_no,
		dept_tbl.deptcode, course_tbl.courseCode, course_tbl.classtype, course_tbl.glevel, course_tbl.semester
		FROM ((((studentscore_tbl
		INNER JOIN session_tbl on studentscore_tbl.seid = session_tbl.seid)
		INNER JOIN dept_tbl on studentscore_tbl.did = dept_tbl.did)
		INNER JOIN course_tbl on studentscore_tbl.cid =course_tbl.cid)
		INNER JOIN student_tbl on studentscore_tbl.stid =student_tbl.stid)
		ORDER BY student_tbl.matric_no ";
		$stmt= $mysqli->query($query);
		return $stmt;
	}
	function del_studentcoursereg($id){//function to delete student course registration

		//  echo $id;exit;
		 $db = Database::getInstance();
		 $mysqli = $db->getConnection();
		 $query="DELETE from studentscore_tbl where studid=?";
		 $stmt= $mysqli->prepare($query);
		 $stmt->bind_param('s',$id);
		 $stmt->execute();
		 echo "<script>alert('student course registration has has been deleted')</script>";
		 header("location:managestudentcoursereg.php");
	 }
	 function showstudentscores(){// function to display studentscores
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query ="SELECT session_tbl.sessioname,studentscore_tbl.fullname,dept_tbl.deptcode, course_tbl.courseCode,course_tbl.creditunit,course_tbl.classtype, course_tbl.glevel, course_tbl.semester,score_tbl.score,score_tbl.grade,score_tbl.gradept,score_tbl.remark
		FROM((((( score_tbl
		INNER JOIN session_tbl on score_tbl.seid =session_tbl.seid )
		INNER JOIN dept_tbl on score_tbl.did = dept_tbl.did )
		INNER JOIN studentscore_tbl on score_tbl.stid = studentscore_tbl.stid)
		INNER JOIN course_tbl on score_tbl.cid =course_tbl.cid)
		INNER JOIN student_tbl on score_tbl.stid = student_tbl.stid)
		group by score_tbl.scid";
		
		
		$stmt= $mysqli->query($query);
		return $stmt;	 
	 }
	 function showstudentscores2(){
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query ="SELECT * from score_tbl";
		$stmt= $mysqli->query($query);
		return $stmt;	 
	 }
	 function delstudentscores($id)
	 {
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query= "DELETE from score_tbl where scid = ?";
		$stmt= $mysqli->prepare($query);
		$stmt->bind_param('s',$id);
		$stmt->execute();
		echo "<script>alert('Student score has been deleted')</script>";
		echo '<script language="javascript">window.location = "managescores.php";</script>';
		//header("location:managescores.php");
	 }

    //puting codes in between this line
}
?>