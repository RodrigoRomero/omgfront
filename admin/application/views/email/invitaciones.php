﻿<?php
$fecha_inicio = explode(" ",$evento->fecha_inicio);
$fecha_cierre = explode(" ",$evento->fecha_baja);
$hora_inicio  = substr($fecha_inicio[1],0,-3);
$hora_cierre  = substr($fecha_cierre[1],0,-3);
$fecha_inicio_array = explode("-", $fecha_inicio[0]);
$fecha_cierre_array = explode("-", $fecha_cierre[0]);
$table = "width:600px;
		 border: none;
		 border-collapse: collapse;
		 margin: 0 auto;
		 font-family: arial, verdana, sans-serif;
		 font-size: 14px;
		 background: #F6F6F6;
		 text-align: center;
		 display:inline";
$p = "font-size:12px;
	  color:#292C28;
	  margin: 10px;
	  text-align: left;";
$btn = "background: none repeat scroll 0 0 #62AF66;
		border: 2px solid #5f6464;
		color: #FFFFFF;
		display: inline-block;
		font-size: 14px;
		font-weight: bold;
		margin: 10px auto;
		padding: 10px;
		text-decoration: none;
		text-transform: uppercase;";

$codeGenerated = getBarCode($user_info->id);
?>
<table width="600" cellpadding="0" cellspacing="0" style="<?php echo $table ?>">
	<tr>
		<td  colspan="3">
			<p style="<?php echo $p ?>">Sr. <?php echo $user_info->nombre.' '.$user_info->apellido ?><br />
			
			<!-- Invitación con codigo de fecha
				Lo esperamos <?php echo $fecha_inicio_array[2] ?> de <?php echo strtoupper(getMes($fecha_inicio_array[1])) ?> de 8:30 a 10:00 para participar de la Semana <?php echo $evento->nombre ?>
				Fin codigo -->
				
				Su inscripción al 9º Encuentro de Reflexión Argentina Visión 2040 ha sido confirmada. 

			Lo esperamos del 12 al 15 de octubre de 8:30 a 10:00 para participar online de la Semana Argentina Visión 2040 <br>	
					
			<!--<strong>Lo esperamos el <?php echo $fecha_inicio_array[2] ?> de <?php echo strtoupper(getMes($fecha_inicio_array[1])) ?> <?php echo $hora_inicio ?>Hs. <?php echo $evento->lugar ?></strong><br />-->
			<br />		</p>
		   </td>
	</tr>
	<!-- BarCode
	<tr>
		<td colspan="3">
			
		<?php echo up_asset('barcodes/'.$codeGenerated['numbers'].'.png', array('style'=>'display: block; margin: 0 auto;')) ?>
		</td>
	</tr>
	Fin BarCode-->
	<!-- <tr>
		<td colspan="3">
		<p style="<?php echo $p ?>"></p>
		</td>
	</tr>
	<tr>
		<td style="padding: 10px 0; border-top: 2px solid #ebebeb; border-bottom: 2px solid #ebebeb" colspan="3">
			<p style="text-transform: uppercase; text-align: center; color: #ce5c5f; font-size: 34px; font-weight: bold; margin: 0"><?php echo $evento->nombre ?></p>
		</td>
	</tr>
	<tr style="border-bottom: 2px solid #ebebeb;">
		<td style="width: 33%;">
			<?php if($fecha_inicio[0] == $fecha_cierre[0]) { ?>
			<p style="margin: 0; text-align: center; color: #444242; font-size: 30px;"><span style="font-weight: bold; font-size: 58px"><?php echo $fecha_inicio_array[2] ?></span><br /><?php echo strtoupper(getMes($fecha_inicio_array[1])) ?></p>
			<?php } ?>
		</td>
		<td style="width: 33%;">
			<table style="width: 80%; border-left: 2px solid #ebebeb; border-right: 2px solid #ebebeb; margin: 0 auto; padding:0 10%; color: #444242; font-size: 12px;">
				<tr>
					<td style="border-bottom: 2px solid #ebebeb; padding: 10px 0; "><b>Desde</b> <?php echo $hora_inicio ?>Hs.</td>
				</tr>
				<tr>
					<td style="padding: 10px 0;"><b>Hasta</b> <?php echo $hora_cierre?>Hs.</td>
				</tr>
			</table>
		</td>
		<td style="width: 33%; text-align: center;">
			<p style="font-weight: bold; margin: 0;"><?php echo $evento->lugar ?></p>
			<p style="margin: 0;"><?php echo $evento->direccion ?></p>
		</td>
	</tr> -->
</table>
