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

			//Get form values
			var posttitle = $('#suscription_form .name-post').val(),
				postnameart = $('#suscription_form .name-art').val(),
				postnameresp = $('#suscription_form .name-resp').val(),
				postdocument = $('#suscription_form .id-card').val(),
				postmail = $('#suscription_form .id-card').val(),
				postcat = $('#suscription_form .category').val(),
				posttel = $('#suscription_form .tel').val();
			

			//Trigger da function
			apfaddpost(posttitle,postnameart,postnameresp,postdocument,postmail,postphoto,postdraw,postcat,posttel);

		});
	
})(jQuery);