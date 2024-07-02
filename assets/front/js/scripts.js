$(document).ready(function() {

	"use strict";

	/* ================= sliders =================  */
		/* =================  Owl Carousel products =============  */
		$(".heroSlider").owlCarousel({
			loop: true,
			nav: true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			dots: true,
			dotsData : true,
			autoplay: true,
			autoplayTimeout: 4000,
			autoplayHoverPause:true,
			smartSpeed:1000,
			items : 1,
			margin : 0,
		});


			$(".productsSlider").owlCarousel({
				loop: true,
				nav: true,
				animateOut: 'fadeOutLeft',
    			animateIn: 'fadeInRight',
				dots: false,
				autoplay: true,
		 	    autoplayTimeout: 4000,
				autoplayHoverPause:true,
		 	    smartSpeed:1000,
				margin : 20,
				responsiveClass: true,
				responsive: {
					0: {
							items: 1,
					},
					575: {
							items: 2,
					},
					767:{
						items: 3,
					},
					991:{
						items: 4,
					}
				}
			});

		/* =================  clients slider =============  */
			$(".clients_review").owlCarousel({
				loop: true,
				nav: false,
				animateOut: 'fadeOutLeft',
    			animateIn: 'fadeInRight',
				dots: true,
				items:2,
				autoplay: true,
		 	    autoplayTimeout: 4000,
				autoplayHoverPause:true,
		 	    smartSpeed:1000,
				margin : 20,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
					},
					575: {
						items: 2,
					},
					767:{
						items : 3,
					}
				}
			});

		// =========== price slider ============
			if($("#range").length > 0){
				var maxval = $('#range').attr('data-maxval');
				var minval = $('#range').attr('data-minval');
				$("#range").ionRangeSlider({
					hide_min_max: true,
					keyboard: true,
					min: minval,
					max: maxval,
					from: 100,
					to: 1000,
					type: 'double',
					step: 1,
					prefix: "$",
					grid: false
				});
			}
	// ========== product slider =============
		if($('.sp-wrap').length > 0){
			$('.sp-wrap').smoothproducts();
		}
	/* =================  mailChimp  =================  */

	var form = $('.subscribe_form');

		if (form.length) {
			form.ajaxChimp({
				callback: mailchimpCallback,
				// Replace the URL above with your mailchimp URL (put your URL inside '').
				url: 'https://ah-theme.us17.list-manage.com/subscribe/post?u=1deb8f74c591046810c8ac1ec&amp;id=ebe56afd26'
			});
		}

		// callback function when the form submitted, show the notification box
		function mailchimpCallback(resp) {

			if (resp.result === 'success') {
				$('.subscription_success').html(resp.msg).slideDown().addClass('active-message');
				$('.subscription_error').slideUp().removeClass('active-message');
			} else {
				$('.subscription_error').html(resp.msg).slideDown().addClass('active-message');
				$('.subscription_success').slideUp().removeClass('active-message');
			}
			setTimeout(function () {
				$('.active-message').slideUp('slow', 'swing');
			}, 4000);
		}
});


/* =================  window load =================  */

$(window).on('load',function(){
		/*----- loader ---------*/
		$('.loader').fadeOut();
    
    /*----- WoW Animations ---------*/
        wow = new WOW();
		wow.init();
	/* ----- subscribe ----- */
	if($('#subscribe').length > 0){
		setTimeout(function(){
			$('#subscribe').fadeIn();
		},3000);
	}
});

/* =================  window Scroll =================  */

$(window).on('scroll , load',function(){
	var window_top = $(window).scrollTop();
		/*---------- menu fixed ----------*/

		if(window_top > 200){
			$('.site_header').addClass('header-scroll_bg_light fadeInDown');
		}
		else {
			$('.site_header').removeClass('header-scroll_bg_light fadeInDown');
		}

		/*---------- menu active item ----------*/

		$('#home , #home section').each(function () {
			var currLink = $(this);
			var refElement = $(currLink).attr("id");
				if ($(this).position().top -100 <= window_top) {
					if($('.nav-item .nav-link[href*='+refElement+']').length>0){
						$('.nav-item.active').removeClass('active');
						$('.nav-item .nav-link[href*='+refElement+']').parent().addClass('active');
					}
				}
		});

/*---------- go to top button ---------*/
    if(window_top > 600){
      $('.goto_top').fadeIn();
    }
    else {
      $('.goto_top').fadeOut();
    }
});

$('.goto_top').on('click',function(e){
    e.preventDefault();
		$('body , html').animate({
			scrollTop: 0
		},1000);
});
/* =================  menu click animate =================  */
$('.navbar-toggler').on('click',function(){
	$('.navbar-toggler svg').toggleClass('fa-times').toggleClass('fa-bars');
});

// ======rate===========
(function($) {
	$('.rating .star').on('mouseenter' , function() {
		$(this).addClass('to_rate');
		$(this).parent().find('.star:lt(' + $(this).index() + ')').addClass('to_rate');
		$(this).parent().find('.star:gt(' + $(this).index() + ')').addClass('no_to_rate');
	}).mouseout(function() {
		$(this).parent().find('.star').removeClass('to_rate');
		$(this).parent().find('.star:gt(' + $(this).index() + ')').removeClass('no_to_rate');
	}).click(function() {
		$(this).removeClass('to_rate').addClass('rated');
		$(this).parent().find('.star:lt(' + $(this).index() + ')').removeClass('to_rate').addClass('rated');
		$(this).parent().find('.star:gt(' + $(this).index() + ')').removeClass('no_to_rate').removeClass('rated');
		/*Save your rate*/
		/*TODO*/
  		});
})(jQuery); 
//============ show password =============
$('.show_pass').on('click',function(e){
	e.preventDefault();
	var _attr = $('#login-pass').attr('type');
	if(_attr == "password"){
		$('#login-pass').attr('type',"text");
	}
	else{
		$('#login-pass').attr('type',"password");
	}
});
/* ----- subscribe ----- */
$('#subscribe .close').on("click",function(){
	$("#subscribe").fadeOut();
});
// =================  contact form  =================  //

$("#contact_form").on('submit',function(t){
	t.preventDefault();
	$('#contact_submit .fa-spin').removeClass('hidden');
	submitForm();
});

function submitForm(){
	var name=$("#your_name").val(),
		email=$("#email").val(),
		phone=$("#phone").val(),
		message=$("#message").val();
	$.ajax({type:"POST",url:"contact.php",
	data:"&name="+name+"&email="+email+"&phone="+phone+"&message="+message,
	success:function(s){
		"success"==s&&formSuccess()}
	})
}
	
function formSuccess(){
	$('#contact_submit .fa-spin').addClass('hidden');
	$("#msgSubmit").removeClass("hidden"),setTimeout(function()
	{
		$("#msgSubmit").addClass("hidden");
	},2e3);
}
// ============ tabs ================= //
$(".nav-tabs .nav-link").on("click" , function(){ 
	var tabName = $(this).attr('href');
	$('.tab-pane').removeClass('active');
	$(tabName).addClass('active')
 })