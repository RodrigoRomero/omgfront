<?php
$gateways = ['transferencia_bancaria' => ['id'=>'transferencia_bancaria', 'type'=>'radio','name'=>'medio_pago', 'class'=>'required', 'value'=>'transferencia_bancaria', 'style'=>'margin-left: 10px'],
              'mercado_pago' => ['id'=>'mercado_pago', 'type'=>'radio','name'=>'medio_pago', 'class'=>'', 'value'=>'mercado_pago', 'style'=>'margin-left: 10px'],
              'pago_mis_cuentas' => ['id'=>'pago_mis_cuentas', 'type'=>'radio','name'=>'medio_pago', 'class'=>'', 'value'=>'pago_mis_cuentas', 'style'=>'margin-left: 10px']
            ];
//$data   = array ('id'=>'gatewayForm', 'class'=>'');
//$action = lang_url('cart/do-gateway');
//echo form_open($action,$data);
?>


<div class="col_full">


<?php
foreach($gateways as $k=>$gateway) {
$name = ucwords(str_replace('_',' ',$k));
?>
<div>
<input id="radio-10" class="radio-style" name="radio-group-3" type="radio" checked>
<label for="radio-10" class="required radio-style-3-label"><?php echo $name ?></label>
</div>


<?php } ?>

			</div>
			<a href="#" class="button button-3d fright">Finalizar</a>
