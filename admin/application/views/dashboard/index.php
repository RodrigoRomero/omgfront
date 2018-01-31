<div class="row-fluid">
    <div class="span12 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Estadística Nominaciones Diarias</h2>
           <div class="box-icon">
            <a class="btn-setting tip-top" data-original-title='Actualizar Estadistica' href="javascript:void(0);" onclick="setChart()"><i class="icon-refresh"></i>Actualizar Estadísticas</a>
           </div>
        </div>
        <div class="box-content">
            <div id="chart_lines" height="400"></div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span3 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Tickets Vendidos</h2>
        </div>
        <div class="box-content text-center" style="background: #f6f6f6;">
            <div class="span6 offset3" style="border: 2px solid #fff; padding: 30px; display:inline-block; border-radius: 10px; background: #36A9E1;">
                <h1 style="color: #ffffff;">
                    <?php echo $total_registros->total; ?>
                </h1>
                <span class="icon-user" style="color: #ffffff; font-size: 25px"></span>
            </div>
        </div>
    </div>

    <div class="span3 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Tickets Nominados</h2>
        </div>
        <div class="box-content text-center" style="background: #f6f6f6;">
            <div class="span6 offset3" style="border: 2px solid #fff; padding: 30px; display:inline-block; border-radius: 10px; background: #36A9E1;">
                <h1 style="color: #ffffff;">
                    <?php echo $total_registros_activos->total; ?>
                </h1>
                <span class="icon-user" style="color: #ffffff; font-size: 25px"></span>
            </div>
        </div>
    </div>



    <div class="span3 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Checkin Totales</h2>
        </div>
        <div class="box-content text-center" style="background: #f6f6f6;">
            <div class="span6 offset3" style="border: 2px solid #fff; padding: 30px; display:inline-block; border-radius: 10px; background: #36A9E1;">
                <h1 style="color: #ffffff;">
                    <?php echo $total_checkins->total; ?>
                </h1>
                <span class="icon-user" style="color: #ffffff; font-size: 25px"></span>
            </div>
        </div>
    </div>


    <div class="span3 box">
        <div class="box-header">
           <h2><i class="icon-pencil"></i>Checkin Promedio</h2>
        </div>
        <div class="box-content text-center" style="background: #f6f6f6;">
            <div class="span6 offset3" style="border: 2px solid #fff; padding: 30px; display:inline-block; border-radius: 10px; background: #36A9E1;">
                <h1 style="color: #ffffff;">
                    <?php
                     echo

                     round($average_checkin->total*100, 2); ?>
                </h1>
                <span class="" style="color: #ffffff; font-size: 25px">%</span>
            </div>
        </div>
    </div>
    </div>
<div class="row-fluid">
	    <div class="span3 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Nominaciones</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <?php foreach($total_nominaciones as $k => $nominaciones){ ?>
                    <tr>
                        <td><?php echo ucwords(trim($k))?></td>
                        <td><?php echo $nominaciones ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>


    <div class="span3 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Registros por Tickets</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <?php foreach($total_by_ticket as $tickets){ ?>
                    <tr>
                        <td><?php echo ucwords(trim($tickets->nombre))?></td>
                        <td><?php echo $tickets->total ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <div class="span3 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Stats Cupones</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
            <?php
                foreach ($cupons_stats as $cupons){
                     echo '<tr><td>'.$cupons->quantity_used.'</td><td>'.$cupons->nombre.'</td></tr>';
                }

            ?>

            </table>
        </div>
    </div>
    <div class="span3 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>CheckIn por Tipo Ticket</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
            <?php
                $grand_total = 0;

                foreach($total_checkins_by_tipo['totales'] as $totals){
                    $grand_total = $grand_total+ $totals->totals;
                    echo '<tr><td>'.$totals->nombre.'</td><td>'.$totals->totals.'</td></tr>';
                }
            ?>
                <tr>
                    <td>Total Global</td>
                    <td><?php echo $grand_total ?></td>
                </tr>
            </table>
        </div>
    </div>

    </div>

    <div class="row-fluid">
    <div class="span3 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Medios Pago Totales</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <?php foreach($total_by_medio_pago as $medios_pago){ ?>
                    <tr>
                        <td>
                            <?php
                            switch(trim($medios_pago->gateway)){

                                case 'mercado_pago':
                                    echo 'Mercado Pago';
                                    break;
                                case 'pago_mis_cuentas':
                                    echo 'Pago Mis Cuentas';
                                    break;
                                case 'transferencia_bancaria':
                                    echo 'Transferencia Bancaria';
                                    break;
                                case 'FOC':
                                    echo 'Free of charge';
                                    break;
                                case 0:
                                default:
                                    echo 'No define medio pago';
                                    break;
                            } ?>
                        </td>
                        <td><?php echo $medios_pago->total ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <div class="span6 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Estadísticas Tickets Vendidos</h2>
           <div class="box-icon">
            <a class="btn-setting tip-top" data-original-title='Actualizar Estadistica' href="javascript:void(0);" onclick="setBarTickets()"><i class="icon-refresh"></i></a>
           </div>
        </div>
        <div class="box-content">
            <div id="chart_bar_tickets" style="height:400px;"  ></div>
        </div>
    </div>
</div>
<div class="row-fluid">
	<?php //echo $smallStats ?>
    <div class="span3 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Facturación</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <tr>
                    <td>Aprobada</td>
                    <td>$ <?php echo $total_facturacion['facturacion_aprobada'] ?></a></td>
                </tr>
                <tr>
                    <td>Pendiente</td>
                    <td>$ <?php echo $total_facturacion['facturacion_pendiente'] ?></td>
                </tr>
                <tr>
                    <td>Rechazada</td>
                    <td>$ <?php echo $total_facturacion['facturacion_rechazada'] ?></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$ <?php echo $total_facturacion['total'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="span3 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Facuración Pendiente</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <?php
                $t = 0;
                foreach($total_facturacion_pendiente_medio as $medios_pago){
                    $t += $medios_pago->total;
                ?>
                    <tr>
                        <td>
                            <?php
                            switch(trim($medios_pago->gateway)){
                               case 'mercado_pago':
                                    echo 'Mercado Pago';
                                    break;
                                case 'transferencia_bancaria':
                                    echo 'Transferencia Bancaria';
                                    break;
                                case 'pago_mis_cuentas':
                                    echo 'Pago Mis Cuentas';
                                    break;
                                case 0:
                                    echo 'No Pagante';
                                    break;
                            } ?>
                        </td>
                        <td>$ <?php echo $medios_pago->total ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td>TOTAL</td>
                    <td>$ <?php echo $t ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php echo $ultimos_acreditados ?>
</div>
<div class="row-fluid">
<div class="span6 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Estadística Planes</h2>
           <div class="box-icon">
            <a class="btn-setting tip-top" data-original-title='Actualizar Estadistica' href="javascript:void(0);" onclick="setPiePlanes()"><i class="icon-refresh"></i></a>
           </div>
        </div>
        <div class="box-content">
            <div id="chart_pie_planes" style="height:300px;"  ></div>
        </div>
    </div>
    <div class="span6 box">
        <div class="box-header">
    	   <h2><i class="icon-pencil"></i>Estadística Pagantes vs No Pagantes</h2>
           <div class="box-icon">
            <a class="btn-setting tip-top" data-original-title='Actualizar Estadistica' href="javascript:void(0);" onclick="setPiePagos()"><i class="icon-refresh"></i></a>
           </div>
        </div>
        <div class="box-content">
            <div id="chart_pie_pagos" style="height:300px;"  ></div>
        </div>
    </div>
</div>
