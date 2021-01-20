<script>
            
           
            $(document).ready(function(){
             
              $("#glevel").change(function(){
               
                var gLevel_ID= $(this).val();
                var sessionName =$('#sessionName').val();
              var dept= $('#Department').val();
              var classtype = $('#classtype').val();
                $.ajax({
                  url:"matric_no.php",
                  method:"POST",
                  data:{glevel:gLevel_ID, sessionN:sessionName, department:dept, classType:classtype},
                  success:function(data){
                    $("#Matric_no").html(data);
                  }
                 
                });
              })
            });

           
             $(document).ready(function(){
             
             $("#Matric_no").change(function(){
              
               var matricID= $(this).find(":selected").attr('value');
               
               $.ajax({
                 url:"fullname.php",
                 method:"POST",
                 data:{regNo:matricID},
                 success:function(data){
                   $("#fullName").val(data);
                 }
                
               });
             })
           });
          
           $(document).ready(function(){
             
             $("#btnLogin").click(function(e){
              
               var gLevel_ID2= $('#glevel2').val();
               var classType =$('#classtype2').val();
             var dept= $('#Department2').val();
             var semester = $('#semester').val();
             e.preventDefault();
               $.ajax({
                 url:"fetch_course.php",
                 method:"POST",
                 data: {glevel:gLevel_ID2, classT:classType, department:dept, semester1:semester },
                 datatype:"html",
                 success:function(data){
                   $("#course1").html(data);
                 }
                
               });
             })
           });
           
            
           $(document).ready(function(){
             
             $("#registercourse1").click(function(e){
                e.preventDefault();
              // var matricID= $(this).find(":selected").attr('value');
             var sessionID= parseInt($('#sessionName').children("option:selected").val());
             var deptcode=parseInt($('#Department2').children("option:selected").val());
             var matric_ID= parseInt($('#Matric_no').children("option:selected").val());
             var course_ID=parseInt($('#course1').children("option:selected").val());
             var fname = $('#fullName').val();
               $.ajax({
                 url:"insertcourses.php",
                 method:"POST",
                 data:{sessionName:sessionID, Department2:deptcode, Matric_no:matric_ID,fullName:fname, course1:course_ID},
                 dataType:"html",
                 success:function(response){
                   $("#coursealert").text(response);
                 }
                
               });
             })
           });
            </script> 