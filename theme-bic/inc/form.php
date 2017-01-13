<div class="form-suscription">
	<div class="container">
		<header>
			<h2>Regístrate</h2>
		</header>
		<form id="suscription_form">

			<div id="messages"></div>

			<!--frists step-->

			<fieldset class="step-1">
				<div class="col-md-6 side-left">
					<span class="input-holder file">
						<input type="file" name="file-draw" placeholder="Adjuntar dibujo" class="file">
						<div class="dummy-field">Adjuntar dibujo</div>
					</span>
					<span class="input-holder file">
						<input type="file" name="file-photo" placeholder="Adjuntar foto" class="file">
						<div class="dummy-field">Adjuntar foto</div>
					</span>
				</div>
				<div class="col-md-6 side-right">
					<span class="input-holder picture">
						<input type="text" name="title"  placeholder="nombre de la obra">
					</span>
					<span class="input-holder kid">
						<input type="text" name="name-art"  placeholder="nombre de tu pequeño artista">
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
						<input type="text" name="dad"  placeholder="nombre del responsable">
					</span>
					<span class="input-holder id-card">
						<input type="text" name="id-card"  placeholder="nº. identidad">
					</span>
				</div>
				<div class="col-md-6 side-right">
					<span class="input-holder email">
						<input type="email" name="email" placeholder="Email">
					</span>
					<span class="input-holder phone">
						<input type="tel" name="tel" placeholder="Celular">
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
						<select name="category">
							<option value="junior">Junior</option>
							<option value="senior">Senior</option>
						</select>
					</span>
				</div>
				
				<div class="col-md-6 side-right">
					<span class="input-holder checkbox">
						<input type="checkbox" name="terms" id="terms">
						<label>Acepto términos y condiciones</label>
					</span>
					<a href="#">Ver términos y condiciones</a>
				</div>

				<div class="asistant-frm">
					<button class="step-3-back btn">Anterior</button>
					<button id="send_data" class="step-3-next btn">Finalizar</button>
				</div>
			</fieldset>

		</form>
	</div>
</div>
