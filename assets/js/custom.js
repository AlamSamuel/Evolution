$(function(){

  var $h6 = $("h6.sender-reply-option");
   $h6.on('click', function(){
     var $divReply = $(".sender-reply-body");
     $divReply.animate({height: 200}, 500);
   });//end of click event on reply

  //  $('a[href="#solicitudes"]').on('click', function(){
  //    //console.log("shit ain't working yo");
  //    $('#solicitudes div.inbox-widget').show($('a div.solicitudes-item'));
  //  });
  //  $('a[href="#support"]').on('click', function(){
  //    //console.log("shit ain't working yo");
  //    $('#todos div.inbox-widget').show($('a div.support-item'));
  //  });
   $('a[href="#todos"]').on('click', function(){
     //console.log("shit ain't working yo");
     //$('#todos div.inbox-widget').clone().append($('a div.solicitudes-item'), $('a div.support-item'));
     $('a div.solicitudes-item:first').clone().appendTo('#todos div.inbox-widget');
   });

});//end of wrap up
