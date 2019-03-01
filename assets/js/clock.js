console.log("Js online:_")

countDown(5 ,60, "status");

function countDown(min, seconds, element){

   var min = min;
   var element = document.getElementById(element);

   element.innerHTML =" Please wait for "+min+" min : "+ seconds+" seconds";
   seconds--;
   
   if(min == 0 && seconds == 0){
      clearTimeout(timer); 
      alert("Your are clear to go");
     min = 5;
     seconds = 60;
   }

   if(seconds == 0){
      seconds = 60;
      min--; 
   }
   
   var timer = setTimeout(() => {
      countDown(min ,seconds, "status");
   }, 1000);   
}