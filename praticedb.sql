SELECT  student_tbl.matric_no, studentscore_tbl.fullname,course_tbl.courseCode,score_tbl.creditunit,score_tbl.gradept,score_tbl.remark

FROM score_tbl
JOIN session_tbl on score_tbl.seid =session_tbl.seid 
JOIN dept_tbl on score_tbl.did = dept_tbl.did 
JOIN studentscore_tbl on score_tbl.stid = studentscore_tbl.stid
JOIN course_tbl on score_tbl.cid =course_tbl.cid
JOIN student_tbl on score_tbl.stid = student_tbl.stid
WHERE dept_tbl.did =1 AND course_tbl.classtype ="ND" AND course_tbl.glevel=1 AND course_tbl.semester="1st" AND session_tbl.seid=4
group by  score_tbl.scid,student_tbl.matric_no,studentscore_tbl.fullname,course_tbl.cid;


