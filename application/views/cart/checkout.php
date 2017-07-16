<div class="container clearfix">
	<div class="fancy-title title-double-border">
		<h1><span>C</span>heckout</h1>
	</div>
	<div class="row clearfix">


		<div class="clear bottommargin"></div>
		<div class="col-md-6">
			<div class="table-responsive clearfix">
				<h4>Tus Entradas</h4>
				<?php $this->load->view('cart/detail', ['delete'=>false]);	?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="table-responsive">
				<h4>Resumen de la compra</h4>
				<?php $this->load->view('cart/resume',['proceedToCheckout' => false]);	?>
			</div>
			<?php $this->load->view('cart/gateways'); ?>


		</div>
	</div>


</div>
