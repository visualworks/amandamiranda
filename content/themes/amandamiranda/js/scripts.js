jQuery(document).ready(function($) {

	if($('.carousel')[0]){
		$('.carousel').carousel({
			interval: 5000 //changes the speed
		});
	}

	if($('#instafeed.redes-sociais-home')[0]){
		var feed = new Instafeed({
			get: 'user',
			userId: '989472587',
			accessToken: '989472587.1677ed0.23ae398f7a7042fd983bc2f3cdfea899',
			resolution: 'low_resolution',
			template: '<div class="box"><div class="boxInner"><a class="animation" target="_blank" href="{{link}}"><img src="{{image}}" /><div class="details"><div class="category"></div><div class="title"></div></div></a></div></div>',
			limit: 8,
			after: function(){
				$('.redes-sociais-home').append('<div class="clear"></div>');
			}
		});
		feed.run();
	}

	if($('.redes-sociais-contato#instafeed')[0]){
		var feed = new Instafeed({
			get: 'user',
			userId: '989472587',
			accessToken: '989472587.1677ed0.23ae398f7a7042fd983bc2f3cdfea899',
			resolution: 'low_resolution',
			template: '<div class="box"><div class="boxInner"><a href="{{link}}" class="fancybox" target="_blank" rel="group"><img src="{{image}}" /><div class="details"></div></a></div></div>',
			limit: 5,
			after: function(){
				$('.redes-sociais-contato').append('<div class="clear"></div>');
			}
		});
		feed.run();
	}


	$(function(){
	   // See if this is a touch device
	   if ('ontouchstart' in window)
	   {
		  // Set the correct [touchscreen] body class
		  $('body').removeClass('no-touch').addClass('touch');

		  // Add the touch toggle to show text when tapped
		  $('div.boxInner img').click(function(){
			$(this).closest('.boxInner').toggleClass('touchFocus');
		  });
	  }
	});


	if ($('#back-to-top').length) {
		var scrollTrigger = 100, // px
		backToTop = function () {
			var scrollTop = $(window).scrollTop();
			if (scrollTop > scrollTrigger) {
				$('#back-to-top').addClass('show');
			} else {
				$('#back-to-top').removeClass('show');
			}
		};
		backToTop();
		$(window).on('scroll', function () {
			backToTop();
		});
		$('#back-to-top').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700);
		});
	}

	$(function() {
		$('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top - 120
					}, 1000);
					return false;
				}
			}
		});
	});

	$(function(){

		if($('.projetos')[0]){
			$('.projetos').mixItUp();
		}

		if($('.midias')[0]){
			$('.midias').mixItUp();
		}

	});
});

jQuery(document).ready(function($) {
	if($('.fancybox')[0]){
		$('.fancybox').fancybox({
			helpers : {
				overlay: {
					locked: false
				}
			},
			padding: 0,
			margin: 32,
		});
	}

	if($('.left')[0]){
		$('.left').addClass("opacity-zero").viewportChecker({
			classToAdd: 'visible animated bounceInLeft',
			offset: 100
		});
	}

	if($('.right')[0]){
		$('.right').addClass("opacity-zero").viewportChecker({
			classToAdd: 'visible animated bounceInRight',
			offset: 100
		});
	}

	if($('.contato')[0]){
		$('.contato .form input').focus(function(){
			$(this).parent().parent().addClass('focus');
		});

		$('.contato .form input').blur(function(){
			if ( !$(this).val() ) {
				$(this).parent().parent().removeClass('focus');
			}
		});
	}

});
