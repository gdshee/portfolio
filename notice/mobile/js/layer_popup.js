 $(document).ready(function(){
     
      $('.openBtn').on('click', function(){
          $(this).parents('dl').next('.product_con').fadeIn('slow');
          $('.contentbox').show();
      });
     
     $('.closeBtn, .contentbox').on('click', function(){
          $('.product_con').fadeOut('fast');
          $('.contentbox').hide();
     });
 });