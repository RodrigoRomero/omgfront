<div class="col-md-6 bottommargin">

	<div class="team team-list clearfix">
		<div class="team-image">
			<?php
			$file_name = 'oradores/'.$item->id.'_0.jpg';
			$speaker_url = base_url('evento/speaker/'.$item->id);

			echo up_asset($file_name);
			?>

		</div>
		<div class="team-desc">
			<div class="team-title"><h4><?php echo $item->nombre ?></h4><span><?php echo $item->cargo ?></span></div>
			<div class="divider divider-short divider-rounded divider-center"><i class="icon-pencil"></i></div>
			<!-- <div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat assumenda similique unde mollitia.</div> -->



			<a href="<?php echo $speaker_url ?>" data-lightbox="ajax" class="button button-border button-rounded button-fill fill-from-bottom button-black" style="text-align: center; display: block;"><span>Ver Bio</span></a>
			<!--
			<div>
			<a href="#" class="social-icon si-rounded si-small si-facebook">
				<i class="icon-facebook"></i>
				<i class="icon-facebook"></i>
			</a>
			<a href="#" class="social-icon si-rounded si-small si-twitter">
				<i class="icon-twitter"></i>
				<i class="icon-twitter"></i>
			</a>
			<a href="#" class="social-icon si-rounded si-small si-gplus">
				<i class="icon-gplus"></i>
				<i class="icon-gplus"></i>
			</a>
			</div>

			-->
		</div>
	</div>

</div>
