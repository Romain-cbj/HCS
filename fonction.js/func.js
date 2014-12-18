$(document).ready(function(){
   $('#contenu').load('index.php');
   $('a').click(function(){
       $('a').removeClass('active');
       $(this).addClass('active');
      var page=$(this).attr('href');
      $('#contenu').load(page+'.php');
      return false;
   });
});