<div class="title-block">

	<?php
	if($position >= 3){
		$position = 4;
	} else {
		$position = $position+1;
	}

	echo heading($item->nombre, ($position))
	?>

	<div class="masonry-thumbs col-6" data-big="1"  data-lightbox="gallery">
		<?php foreach ($sponsors as $sponsor){
			$this->load->view('evento/sponsor-items', ['item'=>$sponsor]);
		}
		?>
	</div>
</div>
