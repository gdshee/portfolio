$(document).ready(function () {
	$('.content_area .maincon dl:eq(0)').show(); 
	
	$('.subcon a').click(function(){  
        var ind= $(this).parent('li').index();
        
        $('.content_area .maincon dl').hide(); 
        $('.content_area .maincon dl:eq('+(ind+1)+')').show(); 
    });
});