<?php
$data = [
	['type'=> 'video', 'thumb' => 'uploads/gallery/thumbs/thumb_video_11.jpg', 'src'=>'https://www.youtube.com/watch?v=LUE9yVtxKlw', 'alt'=>'Alfonso Amat ARGENTINA VISIÓN 2020/40'],
	['type'=> 'fotos', 'thumb' => 'uploads/gallery/thumbs/t22.jpg', 'src'=>'uploads/gallery/original/25.jpg', 'alt'=>'Argentina Visión 2020/40'],
];
?>
<section id="section-gallery" class="page-section">


			<div class="container clearfix" style="">
				<div class="fancy-title title-double-border">
					<h1>Galer&iacute;a</h1>
				</div>

				<div id="page-menu" class="no-sticky">
					<!--
			<div id="page-menu-wrap">

				<div class="container clearfix">



					<nav>
						<ul class="custom-filter" data-container="#portfolio" data-active-class="current">
							<li class="current"><a href="#" data-filter="*"><div>Show All</div></a></li>
							<li><a href="#" data-filter=".pf-icons"><div>Icons</div></a></li>
							<li><a href="#" data-filter=".pf-illustrations"><div>Illustrations</div></a></li>
							<li><a href="#" data-filter=".pf-uielements"><div>UI Elements</div></a></li>
							<li><a href="#" data-filter=".pf-media"><div>Media</div></a></li>
							<li><a href="#" data-filter=".pf-graphics"><div>Graphics</div></a></li>
						</ul>
					</nav>

				<div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

				</div>

			</div>
			-->
		</div><!-- #page-menu end -->
				
				<!-- Portfolio Filter
						============================================= -->
						<ul class="portfolio-filter nobottommargin clearfix" data-container="#portfolio">

							<li class="activeFilter"><a href="#" data-filter="*">Ver todo</a></li>
							<li><a href="#" data-filter=".pf-fotos	">Fotos</a></li>
							<li><a href="#" data-filter=".pf-video">Videos</a></li>
						</ul><!-- #portfolio-filter end -->
						<div class="clear"></div>
						
				<!-- Portfolio Items
				============================================= -->
				<div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">

				<?php
			
				foreach($data as $k => $item){
					$this->load->view('evento/gallery-item', ['position'=>$k, 'item' => $item]);
				}
				?>							
					


					-------------
					<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_11.jpg" alt="Alfonso Amat ARGENTINA VISIÓN 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=LUE9yVtxKlw" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>
					</article>
					
					
					
					<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_10.jpg" alt="Tomás Peña - Managing Director The Yeld Lab y Co-fundador de S4">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=zKZc6f9x0o0" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>
					</article>
					
					
					
					
					<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_9.jpg" alt="Alec Oxenford - Fundador y CEO LetGo">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=YH0RQ75t_S8" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>
					</article>
					
					
					
					
					<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_8.jpg" alt="Javier Goñi - CEO Ledesma">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=yyzzpQklXTA" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>
					</article>
					
					
					
					
					<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_7.jpg" alt="Daniel Pellegrina - Presidente de la Sociedad Rural Argentina">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=1i-APPtoZAM" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>
					</article>
					
					<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_1.jpg" alt="Marcos Peña en Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=kIBqacoExOs" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>
					</article>
					
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/t22.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/25.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/t21.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/24.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/t20.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/23.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/thumbs_gallery_1.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/original_gallery_1.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					
					
										
					<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_2.jpg" alt="Matias Peire - Para el 2050 la resistencia a los antibióticos será la 1º causa de mortalidad">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=yxMuIPt32rw" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>

					</article>
					
				
					
					

						
					<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_3.jpg" alt="Tomás Peña - No podemos ser partícipes pasivos de esta revolución">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=wDLWNFEzGE4" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>
						</article>
						
						<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_4.jpg" alt="Ricardo Negri - Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=xTpuI7KdkZU" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>
						</article>
					
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/thumbs_gallery_3.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/original_gallery_3.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>	
						
					
					
					
					
					
										
										
					
					
					<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_5.jpg" alt="Carolina Stanley - Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=7AA6sPouVPQ" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>
						</article>
						
						<article class="portfolio-item pf-graphics pf-video">
							<div class="portfolio-image">
								<a href="#">
									<img src="uploads/gallery/thumbs/thumb_video_6.jpg" alt="Marcos Peña - Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="https://www.youtube.com/watch?v=-Q8m07fVPhY" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								</div>
							</div>
						</article>
						
						<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/thumbs_gallery_4.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/original_gallery_4.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/thumbs_gallery_5.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/original_gallery_5.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/thumbs_gallery_6.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/original_gallery_6.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					

						
						
						
						
					
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/thumbs_gallery_7.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/original_gallery_7.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					
					
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/thumbs_gallery_9.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/original_gallery_9.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/thumbs_gallery_10.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/original_gallery_10.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					

					
					
					
					
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/thumbs_gallery_14.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/original_gallery_14.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>
					
				
					
					<article class="portfolio-item pf-media pf-fotos">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="uploads/gallery/thumbs/thumbs_gallery_16.jpg" alt="Argentina Visión 2020/40">
								</a>
								<div class="portfolio-overlay">
									<a href="uploads/gallery/original/original_gallery_16.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
					</article>


				</div><!-- #portfolio end -->

			</div>

		</section><!-- #content end -->
