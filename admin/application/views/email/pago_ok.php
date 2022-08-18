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
         display:inline-block";

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

        <td colspan="3">

            <p style="<?php echo $p ?>"><?php echo $user_info->nombre.' '.$user_info->apellido ?><br />

           ¡Su pago ha sido aprobado!<br>
		   Lo esperamos el jueves 25 de agosto, a las 8.30 hs., en el 10° Encuentro de Reflexión Argentina Visión 2040 en el <b>Auditorio de la Casa de Gobierno de la Ciudad de Buenos Aires, 
Uspallata e Iguazú, Parque Patricios (CABA).</b> <br />
 <br /></p>
	           
	           
           <p style="<?php echo $p ?>">
           Recuerde que en caso de que haya comprado más de un ticket para el evento, deberá ingresar los datos de los asistentes para confirmar su inscripción: <br>
           1. Haga click <a href="http://argentinavision2020.com/evento/account/summary"> AQUI </a> y complete los datos de la cuenta con su mail y la contraseña que utilizó para registrarse. <br/>
           2. Haga click en "NOMINAR", complete los datos de los asistentes y, por último, en "INVITAR" para que cada uno de los invitados reciba el link y la contraseña para el encuentro. <br/>
           
           Si adquirió un solo ticket, estos pasos no son necesarios<br/>
           
           <b> Ante cualquier duda, puede comunicarse con: <a href="mailto:nvillaca@bisblick.org"> nvillaca@bisblick.org </a> </b><br/>
           
           

    </p>
        </td>
    </tr>
</table>
