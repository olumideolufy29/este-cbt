$(function() {
     var pgurl = window.location.href;
     $("ul li a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' ){
	          $(this).parent('li').addClass("active");          	
          }
     })
});