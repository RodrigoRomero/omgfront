<div class="modal-dialog">
	<div class="modal-body">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $title ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo $texto ?></p>
			</div>
			<div class="modal-footer">
				 <?php if(!empty($link)) { ?>
					<a class="btn btn-primary j-checkout" href="<?php echo $link ?>">Comprar</a>
			    <?php } ?>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<!--<button type="button" class="btn btn-primary">Save changes</button>-->
			</div>
		</div>
	</div>
</div>
