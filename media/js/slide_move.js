$(document).ready(function () {
            
              var th= $('#headerArea').height() + $('.visual').height(); $('.topMove').hide();
        
              $('.topMove').hide();
              
               // console.log(th);
              //console.log($('header').height());
              //console.log($('.main').height());
           
             $(window).on('scroll',function(){ // 스크롤의 거리가 발생 되면
                  var scroll = $(window).scrollTop();
                 // 스크롤이 움직이면 그 해당 스크롤 탑의 값이 저장 된다
                 
                  //$('.text').text(scroll);
                  if(scroll>250){
                      $('.topMove').fadeIn('slow');
                  }else{
                      $('.topMove').fadeOut('fast');
                  }
             });
           
              $('.topMove').click(function(){
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              });
    
              
       });