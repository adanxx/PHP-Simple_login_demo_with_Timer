
console.log("Script Online");


$(document).ready(function() {


  //1.event-handler for the check-box
  $('#gridCheck1').on('change', function(e) {
      alert("Inactive at Moment");
  }); 


    $('form').on('submit', function(e){ 
       
      e.preventDefault();

       var email = $("#inputEmail").val();
       var password = $("#inputPassword").val();

       

      $.post("ajax/ajax_userAction.php", {userEmail: email, userPassword: password})
            .done(function(data){

              console.log(data);
                
              var countNum =  parseInt(data); 
              
              if(countNum >= 3){
                 lockDown();
              }

            });
    });
});

function lockDown(){
  alert(" Login failed times 3  - trigger lockdonw");
}



