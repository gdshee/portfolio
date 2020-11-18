$(document).ready(function () {
	$('.content_area .main dl:eq(0)').show(); 
	
	$('.sub a').click(function(){  
        var ind= $(this).parent('li').index();
        
        $('.content_area .main dl').hide(); 
        $('.content_area .main dl:eq('+(ind+1)+')').show(); 
    });
});