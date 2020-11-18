    $(document).ready(function () {
	var article = $('.content_area .qa'); // 모든 리스트들
	//article.find('.a').slideUp(100);
	$('.recepi').hide();
     
     
	$('.content_area .qa .trigger').click(function(){  
	var myArticle = $(this).parents('.qa'); 
        

	
	if(myArticle.hasClass('hide')){   
	    article.find('.recepi').slideUp('fast');
		article.removeClass('show').addClass('hide'); 
	    myArticle.removeClass('hide').addClass('show');  
	    myArticle.find('.recepi').slideDown('slow');  
	 } else {  
	   myArticle.removeClass('show').addClass('hide');  
	   myArticle.find('.recepi').slideUp('fast');  
	}  
  });    
	
	
	
}); 