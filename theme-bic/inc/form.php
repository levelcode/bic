<div class="form-suscription" id="registro">
	<div class="container">
		<header>
			<h2>Regístra a tu pequeño artista</h2>
		</header>
		<form id="suscription_form">

			<div id="messages"></div>

			<!--frists step-->

			<fieldset class="step-1">
				<div class="col-md-6 side-left">
					<span class="input-holder file">
						<input type="file" name="file-draw" placeholder="Adjuntar dibujo" class="file">
						<div class="dummy-field">Adjuntar Obra</div>
					</span>
					<span class="input-holder file">
						<input type="file" name="file-photo" placeholder="Adjuntar foto" class="file">
						<div class="dummy-field">Adjuntar foto de colores bic</div>
					</span>
				</div>
				<div class="col-md-6 side-right">
					<span class="input-holder picture">
						<input type="text" name="title" class="name-post" placeholder="nombre de la obra">
					</span>
					<span class="input-holder kid">
						<input type="text" name="name-art" class="name-art"  placeholder="nombre de tu pequeño artista">
					</span>
				</div>
				<div class="asistant-frm">
					<button class="step-1-next btn">Siguiente</button>
				</div>
			</fieldset>

			<!--frists step 2-->

			<fieldset class="step-2">
				<div class="col-md-6 side-left">
					<span class="input-holder dad">
						<span class="prompt-text">
							Solo podrán participar en la actividad las personas mayores de dieciocho (18) años que tengan la patria potestad de su hijo. De no cumplir con lo anterior, el Organizador descalificará a ese participante.
						</span>
						<span class="fk-input">?</span>
						<input type="text" name="dad" class="name-resp"  placeholder="nombre del responsable">
					</span>
					<span class="input-holder id-card">
						<input type="text" name="id-card" class="id-card"  placeholder="Cédula del responsable">
					</span>
					<span class="input-holder id-card kid">
						<input type="text" name="id-card-kid" class="id-card"  placeholder="nº. identidad del pequeño artista">
					</span>
				</div>
				<div class="col-md-6 side-right">
					<span class="input-holder email">
						<input type="email" name="email" class="email" placeholder="Email">
					</span>
					<span class="input-holder phone">
						<input type="tel" name="tel" class="tel" placeholder="Celular">
					</span>
				</div>
				<div class="asistant-frm">
					<button class="step-2-back btn">Anterior</button>
					<button class="step-2-next btn">Siguiente</button>
				</div>
			</fieldset>

			<!--step 3-->

			<fieldset class="step-3">

				<div class="col-md-6 side-left">
					<span class="input-holder select">
						<select name="category" class="category">
							<option value="0" selected>Selecciona categoría</option>
							<option value="4">5 - 8 Años</option>
							<option value="3">9 - 12 Años</option>
						</select>
					</span>
				</div>

				<div class="col-md-6 side-right">
					<span class="input-holder checkbox">
						<input type="checkbox" name="terms" id="terms">
						<label>Acepto términos y condiciones</label>
					</span>
					<a href="<?php bloginfo('template_url')?>/assets/terminos.pdf" target="_blank">Ver términos y condiciones</a>
				</div>

				<div class="asistant-frm">
					<button class="step-3-back btn">Anterior</button>
					<button id="send_data" class="step-3-next btn">Finalizar</button>
				</div>
			</fieldset>

		</form>
	</div>
</div>
