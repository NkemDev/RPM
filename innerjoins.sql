SELECT  student_tbl.matric_no, studentscore_tbl.fullname, SUM( score_tbl.creditunit) AS CU,SUM( score_tbl.gradept*1) AS GP

FROM 

 score_tbl
JOIN session_tbl on score_tbl.seid =session_tbl.seid 
JOIN dept_tbl on score_tbl.did = dept_tbl.did 
JOIN studentscore_tbl on score_tbl.stid = studentscore_tbl.stid
JOIN course_tbl on score_tbl.cid =course_tbl.cid
JOIN student_tbl on score_tbl.stid = student_tbl.stid
WHERE dept_tbl.did =1 AND course_tbl.classtype ="ND" AND course_tbl.glevel=1 AND course_tbl.semester="1st" AND session_tbl.seid=4
group by  student_tbl.matric_no


