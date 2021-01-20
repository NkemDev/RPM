<script>
$(document).ready(function(){
             
             $("#semester1").change(function(){
              var semester_ID =$(this).children("option:selected").val();
            var dept= $('#Department').children("option:selected").val();
             var classtype = $('#classtype1').children("option:selected").val();
             var glevel_ID = $('#glevel1').children("option:selected").val();
               $.ajax({
                 url:"fetchregcourse.php",
                 method:"POST",
                 data:{Semester:semester_ID,department:dept, classType:classtype,glevel:glevel_ID },
                 success:function(data){
                   $("#courses").html(data);
                 }
                
               });
             })
           });
            $(document).ready(function(){
             
             $("#btnLogin").click(function(e){
              
              // var gLevel_ID2= $('#glevel2').val();
              // var classType =$('#classtype2').val();
              var sessionN = $('#sessionName').val();
             var dept= $('#Department').val();
             var course = $('#courses').val();
             e.preventDefault();
               $.ajax({
                 url:"fetch_student.php",
                 method:"POST",
                 data: {sessionName:sessionN, deptcode:dept, courses:course},
                 datatype:"html",
                 success:function(data){
                   $("#fullname").html(data);
                 }
                
               });
             })
           });
           $(document).ready(function(){
             
             $("#courses").change(function(){
              var course_ID =$(this).children("option:selected").val();
              var dept= $('#Department').val();
               $.ajax({
                 url:"fetchcreditunit.php",
                 method:"POST",
                 data:{Course:course_ID,deptcode:dept },
                 success:function(data){
                   $("#creditunit").val(data);
                 }
                
               });
             })
           });

$(document).ready(function(){
             
             $("#score").keyup(function(){
              var score = parseFloat($(this).val()*1);
              var creditunit= parseFloat($('#creditunit').val()*1);
            //  var grade =$('#grade').val();
            //  var creditpt = parseFloat($('#creditpt').val());
            //  var gradept = parseFloat($('#gradept').val());
            //  var remark =$('#remark').val();
              if (score >=80){
                  var grade ="A" ;
                  var creditpt =4;
                  var remark ="Pass";
              }
              else if (score >=70 && score<80){
                  var grade ="AB";
                  var creditpt=3.5;
                  var remark ="Pass";
              }
              else if (score >=60 && score <70){
                var grade ="B";
                var creditpt=3;
                var remark ="Pass";
            }
            else if (score >=50 && score <60){
                var grade ="BC";
                var creditpt=2.5;
                var remark ="Pass";
            }
            else if (score >=40 && score<50){
                var grade ="C";
                var creditpt=2;
                var remark ="Pass";
            }
            else if (score >=30 && score < 40){
                var grade ="CD";
                var creditpt=1.5;
                var remark ="Carry Over";
            }
            else if (score >=20 && score<=29){
                var grade ="D";
                var creditpt=1;
                var remark ="Carry Over";
            }
            else if (score >=10 && score<=19){
                var grade ="E";
                var creditpt=0.5;
                var remark ="Carry Over";
            }
            else{
                var grade="F";
                var creditpt=0;
                var remark ="Carry Over";
            }
            var gp = (creditpt * creditunit).toFixed(2);
                   $("#grade").val(grade);
                   $("#gradept").val(gp);
                   $("#creditpoint").val(creditpt);
                   $("#remark").val(remark);
                 
                
            
             })
           });

     $(document).ready(function(){
             
             $("#btnsave").click(function(e){
                e.preventDefault();
              // var matricID= $(this).find(":selected").attr('value');
             var sessionID= parseInt($('#sessionName').children("option:selected").val());
             var deptcode=parseInt($('#Department').children("option:selected").val());
             var fullname= parseInt($('#fullname').children("option:selected").val());
             var course_ID=parseInt($('#courses').children("option:selected").val());
             var score = $('#score').val();
             var grade =$('#grade').val();
             var creditunit =$('#creditunit').val();
             var gradept =$('#gradept').val();
             var remark =$('#remark').val();
               $.ajax({
                 url:"insertgrades.php",
                 method:"POST",
                 data:{sessionName:sessionID, Department2:deptcode, fullName:fullname, courses:course_ID,Score:score,Grade:grade,CreditUnit:creditunit,Gradept:gradept,Remark:remark},
                 dataType:"html",
                 success:function(response){
                   $("#savealert").text(response);
                 }
                
               });
             })
           });       
</script>