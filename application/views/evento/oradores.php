<section id="section-oradores" class="page-section topmargin-lg">
	<div class="container clearfix">
		<div class="fancy-title title-double-border">
			<h1><span>O</span>radores</h1>
		</div>
	<?php

	foreach($oradores as $k => $item) {
		$this->load->view('evento/orador-item', ['position'=>$k, 'item' => $item]);
	}
	?>
	<div class="clear"></div>
	</div>
</section>
