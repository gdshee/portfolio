$(document).ready(function(){  		
    
 var startY, endY;
    

$('.wrap').on('touchstart mousedown',function(e){
  
 e.preventDefault();
       
 startY=e.pageY || e.originalEvent.touches[0].pageY;
       
 $('body').append(startY + '<br>');
       
    
});
    
    



$('.wrap').on('touchend mouseup',function(e){
    
 e.preventDefault();
       
 endY=e.pageY || e.originalEvent.changedTouches[0].pageY;
        
 $('body').append(endY + '<br>');
    
     
       
 if(startY<endY) {
           
     $('body').append(' 아래로 터치드래그' + '<br>');
     
 
   $('.wrap').css('background','#f00');
 }else{
           
    $('body').append(' 위로 터치드래그' + '<br>');
   
 
   $('.wrap').css('background','#0f0');
 }
      


  
   
 });


});















