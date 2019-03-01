
console.log("Script Online");


$(document).ready(function() {


  //1.event-handler for the check-box
  $('#gridCheck1').on('change', function(e) {
      alert("Inactive at Moment");
  }); 


  //2.Tigger submission form
  $('form').on('submit', function(e){ 
      
    e.preventDefault();

      var email = $("#inputEmail").val();
      var password = $("#inputPassword").val();

      

    $.post("ajax/ajax_userAction.php", {userEmail: email, userPassword: password})
          .done(function(data){

            console.log(data);
              
            var countNum =  parseInt(data); 

            if(countNum >= 3){
               disabledAll();
              countDown(0 ,60, "#lock");
              
            }

          });
  });


  function countDown(min, seconds, element){

    var min = min;
    var sec = seconds;
    var element = $(element);

    element.text(" Please wait for "+min+" min : "+ seconds+" seconds");
    seconds--;
    
    if(min == 0 && seconds == 0){
      clearTimeout(timer); 
      min = 1;
      seconds = 60;
      reset();
     
    }

    if(seconds == 0){
      seconds = 60;
      min--; 
    }
    
    var timer = setTimeout(() => {
        countDown(min ,seconds, "#lock");
    }, 1000);   
  }

  function reset(){
    $(".time-box").fadeOut(2000); 

     //1. send aja_rest file 
     //2.count rest 0 
     //3. empty : success
     //4. enable field and buttons


  }

  function disabledAll(){
    $(".time-box").fadeIn(2000);

     //1. disable button and input fields:

  }




});

