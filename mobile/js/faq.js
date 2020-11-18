// JavaScript Document

 $(document).ready(function () {
	var article = $('.content_area .qa'); // 모든 리스트들
	//article.find('.a').slideUp(100);
	$('.a').hide();
     
     
	$('.content_area .qa .trigger').click(function(){  
	var myArticle = $(this).parents('.qa'); 
        

	
	if(myArticle.hasClass('hide')){   
	    article.find('.a').slideUp('fast');
		article.removeClass('show').addClass('hide'); 
	    myArticle.removeClass('hide').addClass('show');  
	    myArticle.find('.a').slideDown('slow');  
	 } else {  
	   myArticle.removeClass('show').addClass('hide');  
	   myArticle.find('.a').slideUp('fast');  
	}  
  });    
	
	$('.all').toggle(function(){ 
	    article.find('.a').slideDown('slow');
	    article.removeClass('hide').addClass('show');
	},function(){ 
	    article.find('.a').slideUp('fast');
	    article.removeClass('show').addClass('hide');
	});
	
}); 