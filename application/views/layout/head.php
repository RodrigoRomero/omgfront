<title><?php echo $title_page ?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Rodrigo Romero" />
<?php
$metas = array(
	array('name' => 'description', 'content' =>$description),
	array('name' => 'keywords', 'content' => $keywords),
);

echo meta($metas);


?>
<script>
_base_url = "<?php echo config_item('base_url')?>"

	var config = {
		shop_url : "<?php echo config_item('base_url')?>",
		page_handle: "<?php echo uri_string() ?>",
		customer : {
			first_name: "<?php echo (get_session('nombre', false)) ?  get_session('nombre', false) : '' ?>",
			last_name: "<?php echo (get_session('apellido', false)) ? get_session('apellido', false) : '' ?>",
			empresa: "<?php echo (get_session('empresa', false)) ?  get_session('empresa', false) : '' ?>",
			id: "<?php echo (get_session('id', false)) ?  get_session('id', false) : '' ?>",
			is_logged_in: <?php echo ($this->auth->loggedin()) ? 1 : 0 ?>
		}
	}

</script>
<!-- Stylesheets
============================================= -->
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
<?php
#CSS
foreach ($css_layout as $css) {
echo css_asset($css.'.css');
}
?>


<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1748104025451888');
fbq('track', 'PageView');

</script>
<!-- End Facebook Pixel Code -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-104142848-1', 'auto');
  ga('send', 'pageview');

</script>
