

<div class="container clearfix">

					<div class="col-md-6 col-md-push-3 nobottommargin">

						<div class="well well-lg nobottommargin">
							<?php
							$form_name = 'login-form';
							$data   = array ('id'=>$form_name);
							$action =  base_url('/account/restore');
							echo form_open($action,$data);
							?>


								<h3>Ingresá tu mail</h3>

								<div class="col_full">
									<label for="login-form-username">Email:</label>
									<input type="text" id="login-form-username" name="username" value="" class="form-control required email" />
								</div>

								<div class="col_full nobottommargin">

									<button class="button button-3d" id="login-form-submit"  onclick="validateForm('login-form')">Recuperar</button>

								</div>

							<?php echo form_close() ?>
							<a href="<?php echo base_url('account')?>" class="text-center">Crear cuenta</a>
						</div>

					</div>



				</div>
