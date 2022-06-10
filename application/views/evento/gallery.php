<?php
$data = [
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_11.jpg', 'src'=>'https://www.youtube.com/watch?v=LUE9yVtxKlw', 'alt'=>'Alfonso Amat ARGENTINA VISIÓN 2020/40'],
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_10.jpg', 'src'=>'https://www.youtube.com/watch?v=zKZc6f9x0o0', 'alt'=>'Tomás Peña - Managing Director The Yeld Lab y Co-fundador de S4'],
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_9.jpg', 'src'=>'https://www.youtube.com/watch?v=YH0RQ75t_S8', 'alt'=>'Alec Oxenford - Fundador y CEO LetGo'],
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_8.jpg', 'src'=>'https://www.youtube.com/watch?v=yyzzpQklXTA', 'alt'=>'Javier Goñi - CEO Ledesma'],
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_7.jpg', 'src'=>'https://www.youtube.com/watch?v=1i-APPtoZAM', 'alt'=>'Daniel Pellegrina - Presidente de la Sociedad Rural Argentina'],
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_1.jpg', 'src'=>'https://www.youtube.com/watch?v=kIBqacoExOs', 'alt'=>'Marcos Peña en Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/t22.jpg', 'src'=>'uploads/gallery/original/25.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/t21.jpg', 'src'=>'uploads/gallery/original/24.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/t20.jpg', 'src'=>'uploads/gallery/original/23.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/thumbs_gallery_1.jpg', 'src'=>'uploads/gallery/original/original_gallery_1.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_2.jpg', 'src'=>'https://www.youtube.com/watch?v=yxMuIPt32rw', 'alt'=>'Matias Peire - Para el 2050 la resistencia a los antibióticos será la 1º causa de mortalidad'],
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_3.jpg', 'src'=>'https://www.youtube.com/watch?v=wDLWNFEzGE4', 'alt'=>'Tomás Peña - No podemos ser partícipes pasivos de esta revolución'],
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_4.jpg', 'src'=>'https://www.youtube.com/watch?v=xTpuI7KdkZU', 'alt'=>'Ricardo Negri - Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/thumbs_gallery_3.jpg', 'src'=>'uploads/gallery/original/original_gallery_3.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_5.jpg', 'src'=>'https://www.youtube.com/watch?v=7AA6sPouVPQ', 'alt'=>'Carolina Stanley - Argentina Visión 2020/40'],
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_6.jpg', 'src'=>'https://www.youtube.com/watch?v=Q8m07fVPhY', 'alt'=>'Marcos Peña - Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/thumbs_gallery_4.jpg', 'src'=>'uploads/gallery/original/original_gallery_4.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/thumbs_gallery_5.jpg', 'src'=>'uploads/gallery/original/original_gallery_5.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/thumbs_gallery_6.jpg', 'src'=>'uploads/gallery/original/original_gallery_6.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/thumbs_gallery_7.jpg', 'src'=>'uploads/gallery/original/original_gallery_7.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/thumbs_gallery_9.jpg', 'src'=>'uploads/gallery/original/original_gallery_9.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/thumbs_gallery_10.jpg', 'src'=>'uploads/gallery/original/original_gallery_10.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/thumbs_gallery_14.jpg', 'src'=>'uploads/gallery/original/original_gallery_14.jpg', 'alt'=>'Argentina Visión 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/thumbs_gallery_16.jpg', 'src'=>'uploads/gallery/original/original_gallery_16.jpg', 'alt'=>'Argentina Visión 2020/40'],
];
?>
<section id="section-gallery" class="page-section">
	<div class="container clearfix" style="">
		<div class="fancy-title title-double-border">
			<h1>Galer&iacute;a</h1>
		</div>
		<ul class="portfolio-filter nobottommargin clearfix" data-container="#portfolio">
			<li class="activeFilter"><a href="#" data-filter="*">Ver todo</a></li>
			<li><a href="#" data-filter=".pf-fotos	">Fotos</a></li>
			<li><a href="#" data-filter=".pf-video">Videos</a></li>
		</ul>
		<div class="clear"></div>
		<div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">
			<?php
				foreach($data as $k => $item){
					$this->load->view('evento/gallery-item', ['position'=>$k, 'item' => $item]);
				}
			?>	
		</div>
	</div>
</section>
