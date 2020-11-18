$(document).ready(function() {
	$('.family .arrow').click(function(){
		$('.family .aList').show();			  
	});
	$('.family .aList').mouseleave(function(){
		$(this).hide();			  
	});
	//tab키 처리
	  $('.family .arrow').bind('focus', function () {        
              $('.family .aList').show();	
       });
       $('.family .aList li:last').find('a').bind('blur', function () {        
              $('.family .aList').hide();
       });  
});