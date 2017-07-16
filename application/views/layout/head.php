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

<!-- Document Title
============================================= -->

