<?php
$form_name = 'ticketsForm_'.$item->id;
$data   = array ('id'=>$form_name, 'class'=>'form relative', 'style'=>'width:100%');
$action = base_url('cart/add');
echo form_open($action,$data);
echo form_hidden('sku', $item->sku);

$hoy = strtotime(date('Y-m-d'));
$timelimit = strtotime($item->fecha_baja);
$fecha_venta = explode("-",$item->fecha_baja);
$fecha_venta = implode("-",array($fecha_venta[2], getMes($fecha_venta[1]), $fecha_venta[0]));

$data_price = (!empty($item->precio_oferta) && ($hoy < $timelimit)) ? $item->precio_oferta : $item->precio_regular;

/*
$min_qty = 0;
$max_qty = 10;
$steps = 1;

if($item->min_qty > 0 && $item->max_qty==0){
	$steps = floor($max_qty/$item->min_qty);
	$max_qty = $steps*$item->min_qty;
}

if($item->min_qty == $item->max_qty){
	$steps = $item->min_qty;
	$max_qty = floor($max_qty/$item->min_qty)*$item->max_qty;
}
*/

$ticket_description = json_decode($item->descripcion);
$descripcion = '';

if(count($ticket_description) >0 ){
	foreach($ticket_description as $desc){
		$descripcion .= '<li>'.$desc.'</li>';
	}
}

$step = 1;
$start = 0;
$end = 10;
if($item->min_qty == 0  && $item->max_qty == 0 ){
    $step = 1;
} elseif($item->min_qty == 10 && $item->max_qty == 0 ) {

    $step = $item->min_qty;
    $end = ($item->min_qty*$end);
} elseif($item->min_qty>0 && $item->max_qty == 0 ) {
    $step = $item->min_qty;
} elseif($item->min_qty>0 && $item->max_qty > 0 ) {
     $step = 1;
     $start = $item->min_qty;
     $end = $item->max_qty;
}

$options = array_combine(range($start, $end, $step),range($start, $end, $step));

if(!array_key_exists ( 0 , $options )){
    $options[0] = 0;
}
ksort($options);
?>

<div class="pricing-box pricing-extended bottommargin clearfix" style=" <?php echo !empty($item->background) ? 'background: #'.$item->background : ''; ?>; min-height: 320px;">

	<div class="pricing-desc">
		<div class="pricing-title">
			<h3><?php echo $item->nombre ?></h3>
		</div>
		<?php if(count($ticket_description) >0 ){ ?>
		<div class="pricing-features">
			<ul class="clearfix">
			<?php echo $descripcion ?>
			</ul>
		</div>
		<?php } ?>
	</div>

	<div class="pricing-action-area">



	    <?php  if(!empty($item->precio_oferta) &&
	    	      ($hoy < $timelimit) &&
	    	      $item->precio_regular > $item->precio_oferta) { ?>

		   	<?php if($item->agotadas){ ?>
		   		<div class="pricing-meta">Entradas Agotadas</div>
		   		<div class="pricing-price">
		   		<span class="price-unit"><del>$</del></span><del><?php echo number_format($item->precio_oferta, 0, ",", ". ")?></del><span class="price-tenure"><del>$ <?php echo number_format($item->precio_regular, 2, ",", ". ") ?></del></span>
		   		</div>
		   	<?php } else { ?>
		   	<div class="pricing-meta">Hasta: <?php echo $fecha_venta ?></div>
		   		<div class="pricing-price">
		   		<span class="price-unit">$</span><?php echo number_format($item->precio_oferta, 0, ",", ". ") ?><span class="price-tenure"><del>$ <?php echo number_format($item->precio_regular, 2, ",", ". ") ?></del></span>
		   		</div>
	        <?php } ?>

	       <?php  } else { ?>
	        <?php if($item->agotadas){ ?>
	        	<div class="pricing-meta">Entradas Agotadas</div>
	           <div class="pricing-price">
	           <span class="price-unit"><del>$</del></span><del><?php echo number_format($item->precio_regular, 0, ",", ". ") ?></del>
	           </div>
	        <?php } else { ?>

	        	<div class="pricing-price">
	            <span class="price-unit">$</span><?php echo number_format($item->precio_regular, 0, ",", ". ") ?>
	            </div>
	       <?php } ?>

    	<?php } ?>

		<div class="pricing-action">
			<?php if($item->agotadas) { ?>
			<?php } else { ?>
				<p>Seleccione Cantidad Entradas</p>
				<div class="form-group">
				<?php

        $css = 'class="form-control"';
        echo form_dropdown('quantity',$options, 0,  $css);
    ?>
	</div>



				<!--  <input class="jRange" name="quantity" data-max="<?php echo $max_qty?>" data-min="<?php echo $min_qty ?>" data-steps="<?php echo $steps ?>" />-->
				<input type="submit" value="Comprar"  class="button button-3d button-xlarge btn-block nomargin" onclick="validateForm('<?php echo $form_name ?>')" />

			<?php } ?>


		</div>
	</div>

</div>

<?php
echo form_close();
?>
