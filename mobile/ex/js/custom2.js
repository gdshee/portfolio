$(document).ready(function(){  		
    
 var startX, endX;
    

$('.wrap').on('touchstart mousedown',function(e){
  
 e.preventDefault();
       
 startX=e.pageX || e.originalEvent.touches[0].pageX;
       
 $('body').append(startX + '<br>');
       
    
});
    
    



$('.wrap').on('touchend mouseup',function(e){
    
 e.preventDefault();
       
 endX=e.pageX || e.originalEvent.changedTouches[0].pageX;
        
 $('body').append(endX + '<br>');
    
     
       
 if(startX<endX) {
           
     $('body').append(' 오른쪽으로 터치드래그' + '<br>');
     $('.wrap').css('background','#f00');
 }else{      
     $('body').append(' 왼쪽로 터치드래그' + '<br>');
     $('.wrap').css('background','#0f0');
 }
      


  
   
 });


});















