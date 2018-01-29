
<div class="container clearfix">

					<div class="row clearfix">

						<div class="col-sm-3 clearfix">

							<div class="list-group">
								<a href="<?php echo base_url('account/summary')?>" class="list-group-item clearfix">Mis Eventos <i class="icon-calendar pull-right"></i></a>
								<a href="<?php echo base_url('account/profile')?>" class="list-group-item clearfix">Mis datos <i class="icon-user pull-right"></i></a>
								<a href="<?php echo base_url('auth/logout')?>" class="list-group-item clearfix">Logout <i class="icon-line2-logout pull-right"></i></a>
							</div>

						</div>

						<div class="line visible-xs-block"></div>

						<div class="col-sm-9">

							<div class="heading-block noborder">
							<!--	<h3><?php echo $customer->empresa ?></h3> -->
								<h3><?php echo $customer->nombre.' '.$customer->apellido?></h3>
								<span>Por favor, nomine sus entradas con los datos correspondientes de los asistentes en el siguiente ícono <i class="i-plain icon-edit i-small" style=""></i> ubicado en el recuadro de abajo. Es importante que para que cada uno de los asistentes reciba su mail de confirmación con el código de acceso al evento, haga click en el botón de INVITAR en la página que sigue.</span>
							</div>

							<div class="clear"></div>

							<div class="row clearfix">

								<div class="col-md-12">
										<h4>Tus Eventos</h4>


							<?php foreach($orders as $event) {

							 ?>
								<div class="toggle toggle-border" data-state="open">
									<div class="togglet"><i class="toggle-closed icon-ok-circle"></i><i class="toggle-open icon-remove-circle"></i><?php echo $event['name']?></div>
									<div class="togglec">
										<table class="table">
									  <thead>
										<tr>
										  <th>#</th>
										  <th>Cantidad</th>
										  <th>Total</th>
										  <th>Descuentos</th>
										  <th>Final</th>

										  <th>Status</th>
										  <th>Nominar</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php foreach($event['orders'] as $order){
									  	$nominate = 'account/nominate/'.$order->id;
									  	$row_color = '';
									  	$status = '';
									  	switch($order->payment_status){
									  		case 'accredited':
									  		case 'approved':
									  			$row_color = 'success';
									  			$nominar_link = true;
									  			$status = 'Aprobada';
									  		break;


									  		case 'in_process':
									  		case 'in_progress':
									  		case 'pending':
									  			$row_color = 'warning';
									  			$nominar_link = false;
									  			$status = 'Pendiente';
									  		break;



									  		case 'cancelled':
									  			$row_color = 'danger';
									  			$nominar_link = false;
									  			$status = 'Cancelada';
									  			break;


									  		default:
									  			$nominar_link = false;
									  			$row_color = '';
									  			break;
									  	}

									  ?>
									  	<tr class="<?php echo $row_color ?>">
										  <td><?php echo $order->id ?></td>
										  <td><?php echo $order->qty ?></td>
										  <td>$ <?php echo number_format($order->total_price, 2,",",".") ?></td>
										  <td>$ <?php echo number_format($order->discount_amount, 2,",",".") ?></td>
										  <td>$ <?php echo number_format($order->total_discounted_price, 2,",",".")  ?></td>

										  <td><?php echo $status ?></td>
										  <td>
										  	<?php if($nominar_link) { ?>
										  		<a href="<?php echo base_url($nominate) ?>"><i class="i-plain icon-edit i-small" style=""></i></a>
										  	<?php } else { ?>
										  		<a href="javascript:void(0)"><i class="i-plain icon-remove i-small" style=""></i></a>
										  	<?php } ?>

										  </td>
										</tr>
									  <?php } ?>
									  </tbody>
									</table>

									</div>

								</div>

							<?php }?>

								</div>

							</div>

						</div>




					</div>

				</div>
