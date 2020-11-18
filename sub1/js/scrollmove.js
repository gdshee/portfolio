    $(document).ready(function () {

        $('.content_area section:eq(0)').addClass('boxMove');
        //첫번째 내용글 애니메이션 처리 
    
        var h1= $('.content_area section:eq(1)').offset().top-300;
        var h1= $('.content_area section:eq(2)').offset().top-300;
        var h1= $('.content_area section:eq(3)').offset().top-300;
    
     $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
         
     $('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            
            var hg=[];
    
            if(scroll>=hg[0] && scroll<hg[1]){$('.content_area section:eq(0)').addClass('boxMove');}
         
            else if(scroll>=hg[1] && scroll<hg[2]){$('.content_area section:eq(1)').addClass('boxMove');}
                
            else if(scroll>=hg[2]){$('.content_area section:eq(2)').addClass('boxMove');}
        
         });
    
    });

