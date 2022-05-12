<?php
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
		 display:block";

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
?>
<table width="600" cellpadding="0" cellspacing="0" style="<?php echo $table ?>">
	<tr>
		<td  colspan="3">
			<p style="<?php echo $p ?>"><?php echo $user_info->nombre.' '.$user_info->apellido ?><br />
           
           ¡Su pago ha sido aprobado!<br>
           <b>Lo esperamos del 12 al 15 de octubre de 8:30 a 10:00 para participar online de la Semana Argentina Visión 2040</b><br>
           <!-- Texto mail con código para 2021
	           Lo esperamos <?php echo $fecha_inicio_array[2] ?> de <?php echo strtoupper(getMes($fecha_inicio_array[1])) ?> de 8:30 a 10:00 para participar online de la Semana <?php echo $evento->nombre ?>--> 
           
           Recuerde que en caso de que haya comprado más de un ticket para el evento, deberá ingresar los datos de los asistentes para confirmar su inscripción: <br><br/>
           1. Haga click <a href="http://argentinavision2020.com/evento/account/summary"> AQUI </a> y complete los datos de la cuenta con su mail y la contraseña que utilizó para registrarse. <br/>
           2. Haga click en "NOMINAR", complete los datos de los asistentes y, por último, en "INVITAR" para que cada uno de los invitados reciba reciba el link y la contraseña para el encuentro. ¡Muchas gracias! <br/><br/>
           
           Si adquirió un solo ticket, estos pasos no son necesarios<br/><br/>
           
           <b> Ante cualquier duda, puede comunicarse con: <a href="mailto:nvillaca@bisblick.org"> nvillaca@bisblick.org </a> </b><br/>

           <!--Este email confirma que el pago realizado para el evento <?php echo $evento->nombre ?> a llevarse a cabo el día <?php echo $fecha_inicio_array[2] ?> de <?php echo strtoupper(getMes($fecha_inicio_array[1])) ?>. fue aprobado.<br/>-->
            </p>
		</td>
	</tr>


	<tr>
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
	</tr>
</table>
