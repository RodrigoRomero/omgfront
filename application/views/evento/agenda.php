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
<h1>Agenda</h1>
	</div>
	
	<!-- Posts
	============================================= -->






		<?php
			if(count($agenda) >=1){
			foreach($agenda as $k => $item){
				$this->load->view('evento/agenda-item', ['position'=>$k, 'item' => $item]);
			}
			} else {
				echo "<h3 class='text-center'>Próximamente</h3>";
			}
		?>
<div class="one-page-menu center">
 <a href="javascript:void(0)" data-href="#section-tickets"" class="button button-xlarge button-teal">Comprar Tickets</a></div>
	</div>

	</div>



</section>
