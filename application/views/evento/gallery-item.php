<?php
$class = ($item['type'] == 'video') ? 'pf-graphics pf-video' : 'pf-media pf-fotos';
$icon = ($item['type'] == 'video') ? 'icon-line-play' : 'icon-line-plus';
$lightbox = ($item['type'] == 'video') ? 'iframe' : 'image';
?>

<article class="portfolio-item <?php echo $class ?>">
        <div class="portfolio-image">
            <a href="#">
                <img src="<?php echo $item['thumb']?>" alt="<?php echo $item['alt']?>">
            </a>
            <div class="portfolio-overlay">
                <a href="<?php echo $item['src']?>" class="center-icon" data-lightbox="<?php echo $lightbox ?>"><i class="<?php echo $icon ?>"></i></a>
            </div>
        </div>
</article>