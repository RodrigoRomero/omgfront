<?php
$fecha_inicio = explode(" ",$evento->fecha_inicio);
$fecha_cierre = explode(" ",$evento->fecha_baja);
$hora_inicio  = substr($fecha_inicio[1],0,-3);
$hora_cierre  = substr($fecha_cierre[1],0,-3);
$fecha_inicio_array = explode("-", $fecha_inicio[0]);
$fecha_cierre_array = explode("-", $fecha_cierre[0]);

/*
$table = "width:600px;
         border: none;
         border-collapse: collapse;
         margin: 0 auto;
         font-family: arial, verdana, sans-serif;
         font-size: 14px;
         background: #F6F6F6;
         text-align: center;
         display:block";
*/
$table = "width:650px;
         border: none;
         border-collapse: collapse;
         margin: 0 auto;
         font-family: arial, verdana, sans-serif;
         font-size: 14px;
         background: #f6f6f6;
         text-align: center;";

$inner_table = "text-align: left;
                width:650px;
                border: 1px solid #000;
                border-collapse: collapse;
                margin: 20px auto;";

$p = "font-size:12px;
      color:#292C28;
      margin: 10px;
      text-align: center;";

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

$header_content_h1 = "color: #444242;
	                  margin:0;
                      background: #f6f6f6;
	                  padding: 0 20px;
	                  display:block;
	                  font-family:Arial;
	                  font-size: 22px;
                      text-transform: uppercase;
	                  font-weight:bold;
	                  text-align: center;
	                  line-height: 150%;";
?>
<table width="650" cellpadding="0" cellspacing="0" style="<?php echo $table ?>">

    <tr>
        <td  style="padding: 10px" colspan="3">
            <p style="color: #444242; font-size: 15px; text-align: left">Hola <?php echo $user->nombre.' '. $user->apellido ?>: <br/> ¡Te esperamos mañana Jueves 25 de Agosto, a las 8hs., en  la 10° Edición de Argentina Visión 2040: Volver al futuro ¿Qué debería hacer el agro argentino para volver preparado al futuro? </p>

           <p style="color: #444242; font-size: 15px; text-align: left"> El evento se realizará  en el Auditorio de la Casa de Gobierno de la Ciudad de Buenos Aires, Uspallata e Iguazú, Parque Patricios (CABA).</p>
           <p  style="color: #444242; font-size: 15px; text-align: left">Podés estacionar en la vía pública o en el estacionamiento más cercano (Av. Caseros 3057). </p>
           <p  style="color: #444242; font-size: 15px; text-align: left">Vení a escuchar a los referentes del sector y a compartir un espacio de networking. </br>

Equipo Argentina Visión 2040 </p>
        </td>
    </tr>

    <tr>
        <td  colspan="3">
            <h1 style="<?php echo $header_content_h1 ?>"><?php echo $evento->nombre ?></h1>
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

    <tr>
        <td style="padding: 10px 0; border-top: 2px solid #ebebeb; border-bottom: 2px solid #ebebeb; text-align:center;" colspan="3">
            <p style="<?php echo $p ?>">No olvide traer el código de barras impreso o digital</p>
        </td>
    </tr>

    <tr>
        <td colspan="3">
            <?php echo up_asset('barcodes/'.str_pad($user->id,12,'0',STR_PAD_LEFT).'.png', array('style'=>'display: block; margin: 40px auto;')) ?>
        </td>
    </tr>

</table>