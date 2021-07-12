$(document).ready(function(){
    $('input[name=firstname]').css('border-bottom','2px solid black');
    $('input[name=firstname]').click(function(){
        $(this).css('border-bottom','2px solid black');
        $('input[name=lastname]').css('border-bottom','1px solid darkgray');
        $('input[name=email]').css('border-bottom','1px solid darkgray');
        $('input[name=password]').css('border-bottom','1px solid darkgray');
    });
      $('input[name=lastname]').click(function(){
        $(this).css('border-bottom','2px solid black');
        $('input[name=firstname]').css('border-bottom','1px solid darkgray');
        $('input[name=email]').css('border-bottom','1px solid darkgray');
        $('input[name=password]').css('border-bottom','1px solid darkgray');
    });
      $('input[name=email]').click(function(){
        $(this).css('border-bottom','2px solid black');
        $('input[name=firstname]').css('border-bottom','1px solid darkgray');
        $('input[name=lastname]').css('border-bottom','1px solid darkgray');
        $('input[name=password]').css('border-bottom','1px solid darkgray');
    });
      $('input[name=password]').click(function(){
        $(this).css('border-bottom','2px solid black');
         $('input[name=firstname]').css('border-bottom','1px solid darkgray');
        $('input[name=lastname]').css('border-bottom','1px solid darkgray');
        $('input[name=email]').css('border-bottom','1px solid darkgray');
    });

    $('a[id=forgotpassword]').click(function(){
          $('.form-account').css('display','none');
           $('.form-forgot').css('display','block');
           
    })
    $('a[id=cancel]').click(function(){
          $('.form-account').css('display','block');
          $('.form-forgot').css('display','none');
    });
});