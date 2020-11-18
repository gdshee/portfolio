$(document).ready(function(){
  var cnt=4;  //탭메뉴개수  ***
  $('.gs .contlist:eq(0)').show(); //첫번째 내용만 보여라
  $('.gs .tab1').addClass('on');
  
  $('.gs .tab').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.gs .contlist').hide(); // 모든 탭내용을 안보이게 한다
	  $('.gs .contlist:eq('+index+')').show();
	  for(var i=1;i<=cnt;i++){
           $('.tab'+i).removeClass('on');
      }
      $(this).addClass('on'); 
   });
  });
});