

<div class="container clearfix">

					<div class="col-md-6 col-md-push-3 nobottommargin">

						<div class="well well-lg nobottommargin">
							<?php
							$form_name = 'login-form';
							$hidden = array('salt'=>$salt);
							$data   = array ('id'=>$form_name);
							$action =  base_url('/account/changepassword');
							echo form_open($action,$data,$hidden);
							?>


								<h3>Ingresá nueva Contraseña</h3>


							<div class="col_full">
								<label for="register-form-password">Contraseña:</label>
								<input type="password" id="register-password" name="password" value="" class="required form-control" />
							</div>

							<div class="col_full">
								<label for="register-form-repassword">Repetir Contraseña:</label>
								<input type="password" id="register-repassword" name="repassword" equalTo="#register-password" value="" class="form-control required" />
							</div>

								<div class="col_full nobottommargin">

									<button class="button button-3d" id="login-form-submit"  onclick="validateForm('login-form')">Actualizar</button>

								</div>

							<?php echo form_close() ?>
						</div>

					</div>



				</div>
