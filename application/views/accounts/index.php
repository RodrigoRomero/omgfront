<div class="container clearfix">

					<div class="col_one_third nobottommargin">

						<div class="well well-lg nobottommargin">
							<?php
							$form_name = 'login-form';
							$data   = array ('id'=>$form_name);
							$action =  base_url('/auth/login');
							echo form_open($action,$data);
							?>


								<h3>Ingresar a mi cuenta</h3>

								<div class="col_full">
									<label for="login-form-username">Email:</label>
									<input type="text" id="login-username" name="username" value="" class="form-control required email" />
								</div>

								<div class="col_full">
									<label for="login-form-password">Password:</label>
									<input type="password" id="login-password" name="password" value="" class="form-control required" />
								</div>

								<div class="col_full nobottommargin">

									<button class="button button-3d nomargin" id="login-form-submit"  onclick="validateForm('<?php echo $form_name ?>')">Ingresar</button>

								</div>

							<?php echo form_close() ?>
						</div>

					</div>

					<div class="col_two_third col_last nobottommargin">


						<h3>Si no tenes cuenta, registrate ahora.</h3>
						<p>Una vez registrado podras realizar el seguimiento de tus tickets comprados e invitar a quién desees.</p>

						<?php
						$form_name = 'register-form';
						$data   = array ('id'=>$form_name);
						$action =  base_url('/account/create');
						echo form_open($action,$data);
						?>

							<div class="col_half">
								<label for="register-form-name">Empresa:</label>
								<input type="text" id="register-empresa" name="empresa" value="" class="form-control required" />
							</div>
							<div class="col_half col_last">
								<label for="register-form-name">Cargo:</label>
								<input type="text" id="register-cargo" name="cargo" value="" class="form-control required" />
							</div>
							<div class="clear"></div>
							<div class="col_full">
								<label for="register-form-email">Email:</label>
								<input type="text" id="register-email" name="email" value="" class="form-control required email" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="register-form-username">Nombre:</label>
								<input type="text" id="register-nombre" name="nombre" value="" class="form-control required" />
							</div>

							<div class="col_half col_last">
								<label for="register-form-phone">Apellido:</label>
								<input type="text" id="register-apellido" name="apellido" value="" class="form-control required" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="register-form-password">Choose Password:</label>
								<input type="password" id="register-password" name="password" value="" class="required form-control" />
							</div>

							<div class="col_half col_last">
								<label for="register-form-repassword">Re-enter Password:</label>
								<input type="password" id="register-repassword" name="repassword" equalTo="#register-password" value="" class="form-control required" />
							</div>

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button class="button button-3d button-black nomargin" id="login-form-submit"  onclick="validateForm('<?php echo $form_name ?>')">Registrarme</button>

							</div>

						<?php echo form_close() ?>

					</div>

				</div>