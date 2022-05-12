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
			<p style="<?php echo $p ?>"><?php echo $user_info->nombre.' '.$user_info->apellido?><br />
			Usted ha solicitado blanquear la contraseña, para Argentina Visión 2040. Presione el botón a continuación<br/>
			<a href="<?php echo base_url('account/restore/'.$restore_salt) ?>" style="<?php echo $btn ?>">Recuperar Contraseña</a><br/>
			Si usted no solicitó el blanqueo de contraseña, por favor ignore este mail.
			<p>
		   </td>
	</tr>
	<tr>
		<td colspan="3">


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

</table>
