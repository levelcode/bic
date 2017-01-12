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
	
})(jQuery);