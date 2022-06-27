<div class="col-4">
	<div class="card border-0">
		<img src="<?php the_post_thumbnail_url();?>" class="card-img-top" alt="<?php the_title()?>">
		<div class="card-body">
			<div class="card-info d-flex align-items-center">
				<?php the_category();?>
				<span class="post-date">/ &nbsp;<?php the_time('F Y, j')?></span>
			</div>
			<h5 class="card-title"><?php the_title()?></h5>

			<a href="<?php the_permalink();?>" class="button btn card-link  d-flex align-items-baseline"><?= __('Read more','purelab')?></a>
		</div>
	</div>
</div>
