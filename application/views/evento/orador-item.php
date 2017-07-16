<div class="col-md-4 bottommargin">

	<div class="team team-list clearfix">

			<?php
			$file_name = 'oradores/'.$item->id.'_0.jpg';
			$speaker_url = base_url('evento/speaker/'.$item->id);

			echo up_asset($file_name);
			?>
			<div class="team-title"><h4><?php echo $item->nombre ?></h4><span><?php echo $item->cargo ?></span></div>
			<div class="divider divider-short divider-rounded divider-center"><i class="icon-pencil"></i></div>
			<a href="<?php echo $speaker_url ?>" data-lightbox="ajax" class="button button-border button-rounded button-fill fill-from-bottom button-black" style="text-align: center; display: block;"><span>Ver Bio</span></a>
		<
	</div>

</div>
