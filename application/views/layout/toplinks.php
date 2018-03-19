<div class="top-links">
						<ul>
							<?php if($layout == 'one_page') { ?>
							<li class="one-page-menu animated" data-caption-animate="fadeInUp" data-caption-delay="200"><a href="javascript:void(0)" data-href="#section-tickets"">Comprar</a></li>
							<?php } else if($layout == 'multi_page') { ?>
							<li><a href="<?php echo base_url('/#section-tickets') ?>">Comprar</a></li>
							<?php } ?>

							<?php
							if($this->auth->loggedin()) { ?>
								<li><a href="javascript:void(0)">Bienvenido <?php echo get_session('nombre',false).' '.get_session('apellido',false) ?></a></li>
								<li><a href="<?php echo base_url('/account/summary') ?>">Mi Cuenta</a></li>
							<?php } else { ?>
								<li><a href="<?php echo base_url('/account') ?>">Registrarme</a></li>
								<li><a href="javascript:void(0)">Login</a>
								<div class="top-link-section">
									<?php
									$form_name = 'login-header-form';
									$data   = array ('id'=>$form_name);
									$action =  base_url('/auth/login');
									echo form_open($action,$data);
									?>
									<div class="col_full">
									<label for="login-form-username">Email:</label>
									<input type="text" id="login-username" name="username" value="" class="form-control required email" />
								</div>

								<div class="col_full">
									<label for="login-form-password">Password:</label>
									<input type="password" id="login-password" name="password" value="" class="form-control required" />
								</div>

								<div class="col_full nobottommargin">

									<button class="button button-3d" id="login-form-submit"  onclick="validateForm('<?php echo $form_name ?>')">Ingresar</button>

								</div>
									<?php echo form_close() ?>
								</div>
							</li>
							<?php } ?>
							<li><a href="<?php echo base_url('/cart') ?>"><i class="icon-shopping-cart"></i></a></li>
						</ul>
					</div><!-- .top-links end -->
