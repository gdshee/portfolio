 $(document).ready(function(){
     
      $('.openBtn').on('click', function(){
          $(this).parents('dl').next('.product_con').fadeIn('slow');
          $('.box').show();
      });
     
     $('.closeBtn, .box').on('click', function(){
          $('.product_con').fadeOut('fast');
          $('.box').hide();
     });
 });