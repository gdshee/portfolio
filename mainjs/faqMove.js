
$(document).ready(function() {

    var timeonoff2;   //타이머 처리  홍길동 정보
    var imageCount2=3;   //이미지개수
    var cnt2=1;   //이미지 순서 1 2 3 4 5 1 2 3 4 5....
    var onoff2=true; // true=>타이머 동작중 , false=>동작하지 않을때
    $('.faqContent li').hide();
    $('.faqContent li:eq(0)').show();
    
    $('.dot i').css('color','#ccc');
    $('.button1 i').css('color','#f1947d'); //첫번째 불켜
     
 
    function moveg2(){
      cnt2++;  //카운트 1씩 증가.. 5가되면 다시 초기화 0  1 2 3 4 5 1 2 3 4 5..
     
     $('.faqContent li').hide();    
     $('.faqContent .link'+cnt2).fadeIn('slow'); //자신만 이미지가 보인다..
	 		                    
      $('.dot i').css('color','#ccc');
      $('.button'+cnt2).find('i').css('color','#f1947d'); ;//자신만 불켜              
       if(cnt2==imageCount2)cnt2=0;
     }
    

    timeonoff2= setInterval( moveg2 , 4000);// 타이머를 동작 1~5이미지를 순서대로 자동 처리
      //setInterval( function(){처리코드} , 4000)
 /*
    
   $('.dot').click(function(event){  //각각의 버튼 클릭시
	     var $target=$(event.target); //클릭한 버튼 $target
         clearInterval(timeonoff); //타이머 중지     
	 
	     for(var i=1;i<=imageCount;i++){
	         $('.faqContent .link'+i).hide(); //모든 이미지 안보인다.
         } 
	 
		  if($target.is('.button1')){
				 cnt=1;
		  }else if($target.is('.botton2')){
				 cnt=2; 
		  }else if($target.is('.botton3')){ 
				 cnt=3; 
		  }
		  $('.faqContent .link'+cnt).fadeIn('slow');  //자기 자신만 이미지가 보인다
		  
		  for(var i=1;i<=imageCount;i++){
			  $('.botton'+i).css('background','#e3e3e3'); //버튼 모두불꺼
              $('.botton'+i).css('width','5');
		  }
          $('.botton'+cnt).css('background','#f1947d');//자신 버튼만 불켜 
           $('.botton'+cnt).css('width','5');
       
          if(cnt==imageCount)cnt=0;  //카운트 초기화
          timeonoff= setInterval( moveg , 4000); //타이머의 부활!!
	     });
   */     
    });








