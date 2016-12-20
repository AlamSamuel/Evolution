$(function(){


  var $h6 = $("h6.sender-reply-option");
  var $divReply = $(".sender-reply-body");

   /*$h6.on('click', function(){
     $divReply.height('0px');
   });//end of click event on reply*/

  //  $h6.on('click', function(){
  //    $divReply.toggle(function(){
  //      $(this).animate({height: 168}, 500)
  //    },function(){
  //      $(this).animate({height: 0}, 500)
  //    });
  //  });


  $h6.click((function() {
    var i = 0;
    return function() {
        $(this).animate({
            height: (++i % 2) ? 40 : 10}, 200);
    }
})());

});//end of wrap up
