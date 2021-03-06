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

<!-- Document Title
============================================= -->

