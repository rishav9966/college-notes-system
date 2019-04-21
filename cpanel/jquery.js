$(document).ready(function(){
   $("#addcollege").click(function(){
    $("#adddeptform").slideUp();
    $("#addsemform").slideUp();
    $("#addcourseform").slideUp();
    $("#addteacherform").slideUp(); 
    $("#addcollegeform").slideToggle();
   });
});

$(document).ready(function(){
    $("#adddept").click(function(){
       $("#addcollegeform").slideUp();
       $("#addsemform").slideUp();
       $("#addcourseform").slideUp();
       $("#addteacherform").slideUp();
       $("#adddeptform").slideToggle(); 
    });
});

$(document).ready(function(){
    $("#addcourse").click(function(){
        $("#addcollegeform").slideUp();
        $("#adddeptform").slideUp();
        $("#addsemform").slideUp();
        $("#addteacherform").slideUp();
        $("#addcourseform").slideToggle(); 
    });
});

$(document).ready(function(){
    $("#addsem").click(function(){
        $("#addcollegeform").slideUp();
        $("#adddeptform").slideUp();
        $("#addcourseform").slideUp(); 
        $("#addsemform").slideToggle(); 
    });
});

$(document).ready(function(){
   $("#addteacher").click(function(){
      $("#addcollegeform").slideUp();
      $("#adddeptform").slideUp();
      $("#addcourseform").slideUp(); 
      $("#addsemform").slideUp();
      $("#addteacherform").slideToggle();
   });
});




                     //dropdown for add course section
$(document).ready(function(){
   $("#showcollege").change(function(){
      $('#showdept').empty();
      var collegeval = $("#showcollege").val();
      $.ajax({
         url : 'data.php',
         method : 'post',
         data : 'collegeval=' + collegeval,
      }).done(function(dept_row){
         console.log(dept_row);
         selectdept = JSON.parse(dept_row);
         $('#showdept').append('<option '+'selected=""'+'disabled=""'+'>'+ "SELECT DEPT" + '</option>')
         //$('#course').append('<option '+'value=""'+'>'+ "SELECT COURSE" + '</option>')
         selectdept.forEach(function(depts){
            $('#showdept').append('<option>'+ depts.dept + '</option>')
         })
      })
   })
})

                     //dropdown for add teacher section
$(document).ready(function(){
   $("#viewcollege").change(function(){
      $('#viewdept').empty();
      var collegeval = $("#viewcollege").val();
      $.ajax({
         url : 'data.php',
         method : 'post',
         data : 'collegeval=' + collegeval,
      }).done(function(dept_row){
         console.log(dept_row);
         selectdept = JSON.parse(dept_row);
         $('#viewdept').append('<option '+'selected=""'+'disabled=""'+'>'+ "SELECT DEPT" + '</option>')
         //$('#course').append('<option '+'value=""'+'>'+ "SELECT COURSE" + '</option>')
         selectdept.forEach(function(depts){
            $('#viewdept').append('<option>'+ depts.dept + '</option>')
         })
      })
   })
})


