$(document).ready(function () {
    var screenSize = $(window).width(); 
	var screenHeight = $(window).height(); 
    var current=false; 
    
    $("#content").css('margin-top', screenHeight);
    if( screenSize > 768){  
        $("#bimgBG").show();
        $("#simgBG").hide();
        
      }
    if(screenSize <= 768){  
        $("#bimgBG").hide();
        $("#simgBG").show();
      }
  	
    
    
    
    $(window).resize(function(){ 
      screenSize = $(window).width(); 
      screenHeight = $(window).height();
      $("#content").css('margin-top',screenHeight);
        
        if( screenSize > 768 && current==false){  
       
      	
        $("#bimgBG").show();
         
      
        $("#simgBG").hide();
        current=true;
      }
      if(screenSize <= 768){
        $("#bimgBG").hide();
        $("#simgBG").show();
          current=false;
      }
		 
     
    }); 
		
    
    $('.down').click(function () {
        $('html,body').animate({
            'scrollTop': screenHeight
        }, 1000);
    });
    
    
    
    
})