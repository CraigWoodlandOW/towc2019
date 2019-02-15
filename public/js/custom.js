// JavaScript Document
$(document).ready(function(){
 	$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
		$(this).toggleClass('open');
	});
	 $('#nav-icon1').click(function() {
  $('.main-nav').toggleClass('main-nav-mobile');
      $('.header').toggleClass('sticky');   
         AOS.refreshHard(console.log('done'));
});
    });