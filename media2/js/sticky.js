
$(document).ready(function () {
        
        $('.subNav li:eq(0)').find('a').addClass('spy');
        //첫번째 서브메뉴 활성화 //자손중에 찾는거 find
        
       // $('#content div:eq(0)').addClass('boxMove');
        //첫번째 내용글 애니메이션 처리
    
        var hg=[];
            
        for(var i=0; i<8; i++) {
            hg[i] = $('.content_area li').eq(i).offset().top - 200;
            }
    
        
         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다

             //$('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            
            if(scroll>770){ 
//                 $('#headerArea').addClass('headerHide');
                $('#headerArea').fadeOut('fast');
                $('.subNav').addClass('navOn');
                //스크롤의 거리가 350px 이상이면 서브메뉴 고정
            }else{
                $('.subNav').removeClass('navOn');
                 $('#headerArea').fadeIn('fast');
//                 $('#headerArea').removeClass('headerHide');
                //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
            }
            
           
            $('.subNav li').find('a').removeClass('spy');
        
            //스크롤의 거리의 범위를 처리
            if(scroll>=0 && scroll<3230){
                $('.subNav li:eq(0)').find('a').addClass('spy');
                
                //첫번째 서브메뉴 활성화
                
                //$('#content div:eq(0)').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이
            }else if(scroll>=3230 && scroll<5200){
               
                $('.subNav li:eq(1)').find('a').addClass('spy');
                
                //두번째 서브메뉴 활성화
            }else if(scroll>=5200 && scroll<7020){
                
                $('.subNav li:eq(2)').find('a').addClass('spy');
               
            }else if(scroll>=7020 && scroll<8770){
                
                $('.subNav li:eq(3)').find('a').addClass('spy');
                
            }else if(scroll>=8770 && scroll<9715){
                 
                $('.subNav li:eq(4)').find('a').addClass('spy');
              
            }else if(scroll>=9715 && scroll<10685){
                 
                $('.subNav li:eq(5)').find('a').addClass('spy');
                
            }else if(scroll>=10685 && scroll<11705){
                 
                $('.subNav li:eq(6)').find('a').addClass('spy');
                
            }else if(scroll>=11705){
                 
                $('.subNav li:eq(7)').find('a').addClass('spy');
                
                
                
                // $('#content div:eq(1)').addClass('boxMove');
            }
            
             
        });
    
          $('.subNav li a').click(function(){
             var ind=$(this).parents('li').index();
              console.log(ind);
            
            if(ind==0){
                     value= 1245;   
            }else if(ind==1){
                     value= 3230; 
            }else if(ind==2){
                     value= 5200; 
            }else if(ind==3){
                     value= 7020; 
            }else if(ind==4){
                     value= 8770; 
            }else if(ind==5){
                     value= 9715; 
            }else if(ind==6){
                     value= 10685; 
            }else if(ind==7){
                     value= 11705; 
            }
          $("html,body").stop().animate({"scrollTop":value},500);      
    }); 
    
});