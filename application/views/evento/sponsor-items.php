<?php
$name = 'sponsors/'.$item->id.'_0.jpg';
$image_url = up_file($name);
 ?>



<a href="<?php echo $image_url ?>" data-lightbox="gallery-item"><?php echo up_asset($name, ['alt'=>$item->name, 'title'=>$item->name]); ?></a>

