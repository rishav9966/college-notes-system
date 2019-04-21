$(document).ready(function(){
   $("#dept").change(function(){
      
      $('#course').empty();
      var deptval = $("#dept").val();
      $.ajax({
         url : 'data.php',
         method : 'post',
         data : 'deptval=' + deptval,
      }).done(function(course_row){
         console.log(course_row);
         selectcourse = JSON.parse(course_row);
         $('#course').append('<option '+'selected=""'+'disabled=""'+'>'+ "SELECT COURSE" + '</option>')
         //$('#course').append('<option '+'value=""'+'>'+ "SELECT COURSE" + '</option>')
         selectcourse.forEach(function(courses){
            $('#course').append('<option>'+ courses.course + '</option>')
         })
      })
   })
})
$(document).ready(function(){
   $("#course").change(function(){
         $("#dept").change(function(){
            $('#sem').empty();
            $('#sem').append('<option '+'selected=""'+'disabled=""'+'>'+ "SELECT SEMESTER" + '</option>')
            //$('#sem').append('<option' +'value=""'+'>'+ "SELECT SEMESTER" + '</option>')
      })
      var courseval = $("#course").val();
      $.ajax({
         url : 'data.php',
         method : 'post',
         data : 'courseval=' +courseval
      }).done(function(sem_row){
         console.log(sem_row);
         selectsem = JSON.parse(sem_row);
         $('#sem').empty();
         $('#sem').append('<option '+'selected=""'+'disabled=""'+'>'+ "SELECT SEMESTER" + '</option>')
         //$('#sem').append('<option' +'value=""'+'>'+ "SELECT SEMESTER" + '</option>')
         selectsem.forEach(function(semester){
            $('#sem').append('<option>'+ semester.sem + '</option>')
         })
      })
   })
})
