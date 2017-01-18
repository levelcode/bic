(function($){

	//form asistance
	var $formCont = $('#suscription_form');

		$formCont.find('.step-1').addClass('active');

		//prevent default
		$formCont.find('button').click(function(event) {
			event.preventDefault();
		});

		//step 1
		$('.step-1-next').click(function(event) {
			$formCont.find('.step-1').removeClass('active');
			$formCont.find('.step-2').addClass('active');
		});

		//step 2
		$('.step-2-next').click(function(event) {
			$formCont.find('.step-2').removeClass('active');
			$formCont.find('.step-3').addClass('active');
		});

		$('.step-2-back').click(function(event) {
			$formCont.find('.step-1').addClass('active');
			$formCont.find('.step-2').removeClass('active');
		});

		//step 3
		$('.step-3-back').click(function(event) {
			$formCont.find('.step-2').addClass('active');
			$formCont.find('.step-3').removeClass('active');
		});

		//Ajax send method
		$('#suscription_form #send_data').on('click',function(e) {

			e.preventDefault();

			$(this).addClass('.load');
    		$(this).append('<span class="loading"></span>');

			//Trigger da function
			apfaddpost();

		});

		//scrollto

		$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html, body').animate({
			  scrollTop: target.offset().top
			}, 1000);
			return false;
		  }
		}
	  });

	$('.navbar-toggle').click(function(event) {
		$('.nav-collapse').slideToggle(500);
	});
		
	//checked script
	$('#terms').change(function(){
	    var c = this.checked ? '#f00' : '#09f';
			$('#send_data').show(400);
	});

})(jQuery);
