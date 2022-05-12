<section id="section-tickets" class="page-section topmargin-lg">
	<div class="container clearfix">
		<div class="fancy-title title-double-border">
			<h1>Seleccioná tu entrada</h1>
		</div>
		<h3>Modalidad On-Line | de 8.30 a 10hs</h3>
<p>En Argentina, el 17% de los jóvenes en situación de vulnerabilidad acceden a un estudio superior. En BisBlick acompañamos a 89 jóvenes para que puedan finalizar sus estudios superiores. Son jóvenes con alto potencial que, a través del estudio, generan un impacto real en su entorno y su comunidad. ¿Te sumás a ayudarlos? </p>
<p>*La compra de la entrada habilita el ingreso a los cuatro días del evento</p>
		<div class="row pricing bottommargin clearfix">
<?php
	//	ep($this->evento);
		if($this->evento->show_register && (strtotime($this->evento->fecha_baja) > strtotime("+1 day",date('Y-m-d H:i:s')))) {
			if($this->evento->payments_enabled) {
				foreach($tickets as $k => $item) {
					$this->load->view('evento/ticket-item-vertical', ['position'=>$k, 'item' => $item]);
				}
			} else {
				echo 'armar free';
			}
		} else {

			echo 'no enabled';
		}
		?>
		</div>
	</div>

</section>
