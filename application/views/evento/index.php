﻿ <section>
				<div class="section yt-bg-player nomargin dark" data-quality="hd1080" data-start="0" data-stop="17" data-video="https://youtu.be/FLTdJ04qNmQ" style="height: 600px;"> 
					<div class="container vertical-middle center clearfix">
						<!--<i class="i-plain i-large icon-line-video divcenter" data-animate="fadeInDown"></i>-->
						<div class="emphasis-title nomargin" data-animate="fadeInUp">
							<!--<h2 style="font-size: 56px;">Section with Background Youtube Video</h2>-->
						</div>
					</div>
				</div>
</section> 
<section style="background:#24aeef">
        <div class="container clearfix ">
                <div class="">
                <div class="center topmargin-sm bottommargin-sm one-page-menu fadeInUp animated" data-caption-animate="fadeInUp" data-caption-delay="200">
                                                                <a href="javascript:void(0)" data-href="#section-tickets" class="button button-xlarge button-teal">Comprar Tickets</a>
																<a href="https://www.revistachacra.com.ar/argentinavision2040/" target="_blank" class="button button-xlarge button-teal">Ver evento en vivo</a>
              <!--                                                  <a href="https://www.youtube.com/watch?v=feodFYWZ4VM" data-lightbox="iframe" class="button button-xlarge button-inverse hidden-xs">Ver Video</a> -->
                                                              <!--  <a href="#" data-href="#covid19" class="button button-xlarge button-inverse">COVID-19</a>       -->
                                                                </div>
                </div>
        </div>
</section>
<?php echo $this->load->view('evento/corte_a',[],true) ?>
<section>
	<div class="container clearfix ">
				<div class="topmargin-sm">
					<h3 class="center">Organizan</h3>
					<ul class="clients-grid grid-4 nobottommargin clearfix">

						<!--<li><img src="uploads/organizadores/ministerio.png" class="fadeInDown animated" alt="Ministerio de Producción" data-animate="fadeInDown"> </a></li>-->
						
						<li><img src="uploads/organizadores/austral.png" class="fadeInDown animated" alt="Universidad Austral"></a></li>
						<li><img src="uploads/organizadores/logo_argensun.jpg" class="fadeInDown animated" alt="Argensun"></a></li>
						<li><img src="uploads/organizadores/adblick.png" class="fadeInDown animated" alt="ADBlick Agro"></a></li>
						
						
						<li><img src="uploads/organizadores/bb.png" class="fadeInDown animated" alt="BisBlick Talento Joven"></a></li>
					</ul>
					
<!-- 					<h3 class="center">	<a href="http://argentinavision2020.com/2017/uploads/galeria/polo_tecnologico.jpg"  data-lightbox="image"  class=" button button-xlarge ">Conozca el Lugar</a></h3>

						<li><img src="uploads/organizadores/adblick.png" class="fadeInDown animated" alt="ADBlick Agro"></a></li>
						<li><img src="uploads/organizadores/austral_nuevo.png" class="fadeInDown animated" alt="Universidad Austral"></a></li>
						<li><img src="uploads/organizadores/ministerio.png" class="fadeInDown animated" alt="Ministerio de Producción" data-animate="fadeInDown"> </a></li>
						<li><img src="uploads/organizadores/bb.png" class="fadeInDown animated" alt="BisBlick Talento Joven"></a></li>
					</ul>
					
 -->


				</div>
				
	</div>
</section>
<?php echo $agenda; ?>
<?php echo $oradores; ?>
<?php echo $sponsors; ?>
<section>	
					<div class="container clearfix">
						
						
					</div>
</section>
<?php echo $tickets; ?>
<?php echo $this->load->view('evento/evento_virtual',[],true) ?>
<?php // echo $lugar; ?>

<!--
				<section>	
					<div class="container clearfix">
						<h3 class="center">	<a href="http://argentinavision2020.com/2017/uploads/galeria/polo_tecnologico.jpg"  data-lightbox="image"  class=" button button-xlarge ">Conozca el Lugar</a></h3>
						<div class="line"></div>

						<h2>Cómo llegar</h2>

						<div class="tabs clearfix" id="tab-3">

							<ul class="tab-nav tab-nav2 clearfix">
								<li><a href="#tabs-9"><i class="icon-home2 norightmargin"></i></a></li>
								<li><a href="#tabs-10">Estacionamiento</a></li>
								<li><a href="#tabs-11">Colectivo</a></li>
								<li class="hidden-phone"><a href="#tabs-12">Subte / Tren</a></li>
							</ul>

							<div class="tab-container">

								<div class="tab-content clearfix" id="tabs-9">
									El Centro Cultural de las Ciencias se encuentra ubicado en el corazón de Palermo a sólo 3 cuadras de Plaza Italia.
								</div>
								<div class="tab-content clearfix" id="tabs-10">
									Estacionamiento en Distrito Arcos : Godoy Cruz 2402 - Estacionamiento en Soler entre Juan B justo y Godoy Cruz
								</div>
								<div class="tab-content clearfix" id="tabs-11">
									<p>10 - 12 - 15 - 29 - 34 - 36 - 39 - 41 - 55 - 57 - 59 - 60 - 64 - 67 - 68 - 93 - 95 - 108 - 111 - 118 - 128 - 141 - 152 - 160 - 161 - 166 - 194</p>
									
								</div>
								<div class="tab-content clearfix" id="tabs-12">
									A 3 cuadras de la linea D de subte. SUBTE: PALERMO - LÍNEA D - TREN: PALERMO - SAN MARTÍN
								</div>

							</div>

						</div>
					</div>
				</section>
				-->

<?php //echo $this->load->view('evento/corte_a',[],true) ?>
<?php echo $this->load->view('evento/gallery',[],true) ?>

<?php //echo $agenda; ?>


