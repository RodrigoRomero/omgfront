<section id="section-tickets" class="page-section topmargin-lg">
	<div class="container clearfix">
		<div class="fancy-title title-double-border">
			<h1>Seleccioná tu entrada</h1>
		</div>
		
<h3>En Argentina, sólo el 13% de los jóvenes de contextos vulnerables logra realizar un estudio superior. ARGENTINA VISIÓN 2040 se realiza 100% a beneficio de BisBlick, ONG que brinda a jóvenes con alto potencial y escasos recursos económicos la oportunidad de convertirse en los primeros profesionales de sus familias.
Con tu entrada ayudás a que más jóvenes puedan realizar una carrera universitaria/terciaria y transformar su futuro.   </h3>

		<div class="row pricing bottommargin clearfix">
<?php
	//	ep($this->evento);
		if($this->evento->show_register && (strtotime($this->evento->fecha_baja) > strtotime("+1 day",date('Y-m-d H:i:s')))) {
			if($this->evento->payments_enabled) {
				foreach($tickets as $k => $item) {
					$this->load->view('evento/ticket-item', ['position'=>$k, 'item' => $item]);
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
