<nav id="primary-menu">
<?php if($layout == 'one_page') { ?>
	<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1500">
		<li><a href="#" data-href="#home"><div>Home</div></a></li>
		<!--<li><a href="#" data-href="#section-agenda"><div>Agenda</div></a></li>-->
		<li><a href="#" data-href="#section-tickets"><div>Tickets</div></a></li>
		<li><a href="#" data-href="#section-oradores"><div>Oradores</div></a></li>
		<li><a href="#" data-href="#section-sponsors"><div>Sponsors</div></a></li>
		<!--<li><a href="#" data-href="#section-lugar"><div>Lugar</div></a></li>-->
		<li><a href="#" data-href="#section-gallery"><div>Galería</div></a></li>
	</ul>
<?php } else if($layout == 'multi_page') { ?>
	<ul >
		<li><a href="<?php echo base_url('/#home') ?>"><div>Home</div></a></li>
		<li><a href="<?php echo base_url('/#section-agenda') ?>" ><div>Agenda</div></a></li>
		<li><a href="<?php echo base_url('/#section-tickets') ?>" ><div>Tickets</div></a></li>
		<li><a href="<?php echo base_url('/#section-oradores') ?>" ><div>Oradores</div></a></li>
		<li><a href="<?php echo base_url('/#section-sponsors') ?>" ><div>Sponsors</div></a></li>
		<li><a href="<?php echo base_url('/#section-lugar') ?>" ><div>Lugar</div></a></li>
		<li><a href="<?php echo base_url('/#section-gallery') ?>" ><div>Galería</div></a></li>
	</ul>
<?php } ?>


	<!-- Top Cart
	============================================= -->
	<div id="top-cart">
		<a href="<?php echo base_url('/cart') ?>"><i class="icon-shopping-cart"></i></a>
	</div><!-- #top-cart end -->
</nav><!-- #primary-menu end -->
