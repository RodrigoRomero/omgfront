<div class="col-md-4 bottommargin">
	<div class="team team-list clearfix" style="height: 550px;">
		<?php
		$file_name = 'oradores/'.$item->id.'_0.jpg';
		$speaker_url = base_url('evento/speaker/'.$item->id);
		echo up_asset($file_name);
		?>
		<div class="team-title center">
			<h4><?php echo $item->nombre ?></h4><span><?php echo $item->cargo ?></span>
		</div>

		<div class="divider divider-short divider-rounded divider-center"></div>
		<a href="<?php echo $speaker_url ?>" data-lightbox="ajax" class="button button-border button-rounded button-fill fill-from-bottom button-violet" style="text-align: center; position:absolute; width: 100%; bottom: 0px; margin: 0px"><span>Ver Bio</span></a>
	</div>
</div>
