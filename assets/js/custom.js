$(function(){


  var $h6 = $("h6.sender-reply-option");
  var $divReply = $(".sender-reply-body");
   $h6.on('click', function(){
     console.log("you!");
     if($divReply.hasClass('slide-up')){
       $divReply.addClass('slide-down');
       $divReply.removeClass('slide-up');
     }else{
       $divReply.removeClass('slide-down');
       $divReply.addClass('slide-up', 1000, 'easeOutBounce');
     }
   });//end of click event on reply

});//end of wrap up
