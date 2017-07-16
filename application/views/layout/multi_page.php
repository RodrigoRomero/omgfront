<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<?php $this->view('layout/head.php')?>
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<div id="top-bar">

			<div class="container clearfix">
				<div class="col_half col_last fright nobottommargin">

					<!-- Top Links
					============================================= -->
					<div class="top-links">
						<ul>
							<?php
							if($this->auth->loggedin()) { ?>
								<li><a href="javascript:void(0)">Bienvenido <?php echo get_session('nombre',false).' '.get_session('apellido',false) ?></a></li>
								<li><a href="<?php echo base_url('/account/summary') ?>">Mi Cuenta</a></li>
							<?php } else { ?>
								<li><a href="<?php echo base_url('/account') ?>">Ingresar | Registrarme</a></li>
							<?php } ?>
							<li><a href="<?php echo base_url('/cart') ?>"><i class="icon-shopping-cart"></i></a></li>
						</ul>
					</div><!-- .top-links end -->

				</div>

			</div>

		</div><!-- #top-bar end -->

		<!-- Header
		============================================= -->
		<header id="header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="<?php echo base_url('/') ?>" class="standard-logo" data-dark-logo="images/logo-dark.png">
							<?php echo image_asset('logo.png', '','') ?>
						</a>
						<a href="<?php echo base_url('/') ?>" class="retina-logo" data-dark-logo="images/logo-dark@2x.png">
							<?php echo image_asset('logo.png', '','') ?>
						</a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul >
							<li><a href="<?php echo base_url('/#home') ?>"><div>Home</div></a></li>
							<li><a href="<?php echo base_url('/#section-agenda') ?>" ><div>Agenda</div></a></li>
							<li><a href="<?php echo base_url('/#section-oradores') ?>" ><div>Oradores</div></a></li>
							<li><a href="<?php echo base_url('/#section-sponsors') ?>" ><div>Sponsors</div></a></li>
							<li><a href="<?php echo base_url('/#section-lugar') ?>" ><div>Lugar</div></a></li>
							<li><a href="<?php echo base_url('/#section-tickets') ?>" ><div>Tickets</div></a></li>
						</ul>


					</nav>
					<!-- #primary-menu end -->


				</div>

			</div>

		</header><!-- #header end -->



		<!-- Content
		============================================= -->
				<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">
				<?php echo $module ?>


			</div>

		</section><!-- #content end -->

	<?php echo $footer ?>

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>
	<?php
		foreach ($js_layout as $js) {
	    	echo js_asset($js.'.js');
		}
		echo js_asset('jquery.gmap.js');

		#WIDGETS
		foreach($widgets as $folder => $v){
		    $widgetFolder = $folder;
		    foreach ($v as $type => $file){
		        if($type=='css'){
		            if(is_array($file)){
		                foreach ($file as $f){
		                    echo css_asset($type.'/'.$f.'.'.$type,'../third_party/'.$widgetFolder);
		                }

		            } else {
		                echo css_asset($type.'/'.$file.'.'.$type,'../third_party/'.$widgetFolder);
		            }

		        } elseif ($type=='js'){
		            if(is_array($file)){
		                foreach ($file as $f){
		                    echo js_asset($type.'/'.$f.'.'.$type,'../third_party/'.$widgetFolder);
		                }
		            } else {
		                echo js_asset($type.'/'.$file.'.'.$type,'../third_party/'.$widgetFolder);
		            }
		        } else {
		            show_error('formato no valido',500,'Problema al parsear Widget');
		        }
		    }
		}
	?>
</body>
</html>
