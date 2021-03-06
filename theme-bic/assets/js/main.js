(function($){

	//form asistance
	var $formCont = $('#suscription_form');

		$formCont.find('.step-1').addClass('active');

		//prevent default
		$formCont.find('button').click(function(event) {
			event.preventDefault();
		});

		//Check file
		$("input:file").change(function (){
			var fileName = $(this).val();
			$(this).siblings(".dummy-field").html('Archivo cargado');
		});

		//step 1
		$('.step-1-next').click(function(event) {

			if($('input.file').val() === ""){

				$('#messages').append('<p class="error">No has adjuntado los archivos</p>');
			
			} else if($('.name-post').val() === "" ) {
				
				$('#messages').append('<p class="error">Ingresa el nombre de la obra</p>');
			
			} else if($('.name-art').val() === "") {
				
				$('#messages').append('<p class="error">Ingresa el nombre de tu artista</p>');
			
			} else {
				$('#messages').append('');
				$formCont.find('.step-1').removeClass('active');
				$formCont.find('.step-2').addClass('active');	
			}
		});

		//step 2
		$('.step-2-next').click(function(event) {

			if($('input.name-resp').val() === ""){

				$('#messages').append('<p class="error">Ingresa el nombre del Responsable</p>');
			
			} else if($('input.id-card').val() === ""){

				$('#messages').append('<p class="error">Ingresa la cédula del Resposable</p>');
			
			} else if($('input.id-kid').val() === ""){

				$('#messages').append('<p class="error">Ingresa el documento del Niño</p>');
			
			} else if($('input.email').val() === ""){

				$('#messages').append('<p class="error">Ingresa el Correo</p>');
			
			} else if($('input.tel').val() === ""){

				$('#messages').append('<p class="error">Ingresa el Celular</p>');
			
			} else {
				$('#messages').append('');
				$formCont.find('.step-2').removeClass('active');
				$formCont.find('.step-3').addClass('active');
			}

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

			$(this).parent('#suscription_form').validate();
			
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

	//modal close

	$('.form-suscription #suscription_form .modal_form .close, .close-modal').click(function(event) {
		
		event.preventDefault();
		$('.form-suscription #suscription_form .modal_form').fadeOut(500);
	
	});

	$('.navbar-toggle').click(function(event) {
		$('.nav-collapse').slideToggle(500);
	});
		
	//checked script
	$('#terms').change(function(){
	    var c = this.checked ? '#f00' : '#09f';
			$('#send_data').show(400);
	});

	//prompt text
	$('.fk-input').click(function(event) {
		$(this).siblings('.prompt-text').fadeToggle(400);
	});

	//Voto realizado
	var voteSel = $('.wpulike .counter a');

	voteSel.click(function(event) {
		/* Act on the event */
		if(voteSel.attr('data-ulike-status') === 2){
			$(this).append('Gracias por tu voto!');
		}

	});
	
})(jQuery);
