<?php

$place = explode(",", $this->evento->direccion);
$fecha_inicio = explode(" ",$this->evento->fecha_inicio);
$fecha_cierre = explode(" ",$this->evento->fecha_baja);
$hora_inicio  = substr($fecha_inicio[1],0,-3);
$hora_cierre  = substr($fecha_cierre[1],0,-3);
$fecha_inicio_array = explode("-", $fecha_inicio[0]);
$fecha_cierre_array = explode("-", $fecha_cierre[0]);

?>
<section id="section-agenda" class="page-section topmargin-lg">

	<div class="">

	<div class="container clearfix">
	<div class="fancy-title title-double-border">
		<h1>Semana Argentina Visión 2040</h1>
	</div>
	
	<!-- Posts
	============================================= -->






		<?php
			foreach($agenda as $k => $item){
				$this->load->view('evento/agenda-item', ['position'=>$k, 'item' => $item]);
			}
		?>
<div class="one-page-menu center">
 <a href="javascript:void(0)" data-href="#section-tickets"" class="button button-xlarge button-white">Comprar Tickets</a></div>
	</div>

	</div>



</section>
