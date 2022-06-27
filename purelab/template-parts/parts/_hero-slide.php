<?php

$active = $args['info'];
?>
<div class="carousel-item <?= ($active==0)?'active':''?>">
	<img src="<?php the_post_thumbnail_url('full');?>" class="d-block w-100" alt="<?php the_title()?>">
	<div class="carousel-caption">
		<?php the_category();?>
		<h5 class="post-title"><?php the_title()?></h5>
		<div class="post-content"><?php the_content();?></div>
		<a href="<?php the_permalink()?>" target="_blank" class="button btn"><?=__('Read more','purelab')?></a>
	</div>
</div>
