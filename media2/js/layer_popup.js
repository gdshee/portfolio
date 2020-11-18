 $(document).ready(function(){
     
      $('.openBtn').on('click', function(){
          $(this).next('.big').fadeIn('slow');
          $('.box').show();
      });
     
     $('.closeBtn, .box').on('click', function(){
          $('.big').fadeOut('fast');
          $('.box').hide();
     });
 });
