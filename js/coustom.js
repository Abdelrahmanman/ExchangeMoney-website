/*global $ */
/* smooth scroll */
$(function () {
    'use strict';

/* Start nice scroll with click on links */

    $('.nav li a ,.fa-angle-down').click(function () {
       $('html, body').animate({
        scrollTop : $('#' + $(this).data('value')).offset().top}, 500);
    });

/* End nice scroll with click on links */



/* Start changing active link*/

    $('li').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

/* End changing active link*/


/* Trigger NiceScroll */

    $('html').niceScroll({cursorcolor:"#232526", cursorborder:"none",cursorwidth: "7px"})

/* End Trigger NiceScroll */



   /* Start Loading Trick */


    $(window).load(function(){
        $('.loading').fadeOut(3000);
    })


   /* Start Loading Trick */





   /* Start Hide And show the button with the Scroll */

    $(window).scroll(function(){
       if($(this).scrollTop() >= 500)
           {
               $('.top').slideDown();
           }
       else
           {
               $('.top').slideUp();
           }
   })


  /* End Hide And show the button with the Scroll */
  $(".top").click(function(){
		$("html,body").animate({scrollTop:0},100);

		})



 $('.signbtn').click(function(){
    $('.signup').slideDown(1000, function(){
      $('.login').slideUp(1000, function(){
        $('.contacththree').fadeOut(300 , function(){
          $('.contacththree2').fadeIn();
        })
      });
    });
  })


  $('.loginbtn').click(function(){
     $('.login').slideDown(300, function(){
       $('.signup').slideUp(300, function(){
         $('.contacththree2').fadeOut(300 , function(){
           $('.contacththree').fadeIn();
         })
       });
     });
   })

   $('.question .btn').click(function(){
     $('.ask input').slideDown();
   })


   $('.cur2').click(function(){
     $('.quantity').css('margin-left','0');
   })

   $('.quantity').click(function(){
     $('.currency .btn').css('margin-left','0');
   })



});
