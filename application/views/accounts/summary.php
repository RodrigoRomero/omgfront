
<div class="container clearfix">

					<div class="row clearfix">

						<div class="col-sm-3 clearfix">

							<div class="list-group">
								<a href="<?php echo base_url('account/profile')?>" class="list-group-item clearfix">Mis datos <i class="icon-user pull-right"></i></a>
								<a href="<?php echo base_url('auth/logout')?>" class="list-group-item clearfix">Logout <i class="icon-line2-logout pull-right"></i></a>
							</div>

						</div>

						<div class="line visible-xs-block"></div>

						<div class="col-sm-9">

							<div class="heading-block noborder">
								<h3><?php echo $customer->empresa ?></h3>
								<span><?php echo $customer->nombre.' '.$customer->apellido?></span>
							</div>

							<div class="clear"></div>

							<div class="row clearfix">

								<div class="col-md-12">
										<h4>Tus Eventos</h4>


							<?php foreach($orders as $event) { ?>
								<div class="toggle toggle-border">
									<div class="togglet"><i class="toggle-closed icon-ok-circle"></i><i class="toggle-open icon-remove-circle"></i><?php echo $event['name']?></div>
									<div class="togglec">
										<table class="table">
									  <thead>
										<tr>
										  <th>#</th>
										  <th>Cantidad</th>
										  <th>Precio</th>
										  <th>Status</th>
										  <th>Nominar</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php foreach($event['orders'] as $order){
									  	$row_color = '';
									  	$status = '';
									  	switch($order->payment_status){
									  		case 'accredited':
									  		case 'approved':
									  			$row_color = 'success';
									  			$status = 'Aprobada';
									  		break;

									  		case 'in progress':
									  		case 'pending':
									  			$row_color = 'danger';
									  			$status = 'Pendiente';
									  		break;

									  		default:
									  			$row_color = '';
									  			break;
									  	}

									  ?>
									  	<tr class="<?php echo $row_color ?>">
										  <td><?php echo $order->id ?></td>
										  <td>Column content</td>
										  <td><?php echo $order->total_discounted_price ?></td>
										  <td><?php echo $status ?></td>
										  <td>Column content</td>
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
