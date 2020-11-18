$(document).ready(function() {
		var boxHeight2 =  $('.nbox li:eq(0)').outerHeight();

		for(var i=0; i<6; i++){
					$(".nbox li:eq("+ i +")").css('height',boxHeight2);
		}

	$(window).resize(function(){ 
		$('.nbox li:eq(0)').css('height','auto');  
    boxHeight2 =  $('.nbox li:eq(0)').outerHeight();

		for(var i=0; i<6; i++){
					$(".nbox li:eq("+ i +")").css('height',boxHeight2);
		}

	});

 });