$(document).ready(function(){
   //alert("Ich bin jq nice to meet you yo!");
   $("h6.sender-reply-option").click(function(){
     $("div.sender-reply-body").hide("slow", function(){
     });
   });

   $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
});

});//end of wrap up
