<div class="section__post-row row align-items-center text-center text-lg-start">

	<div class=" col-12 col-lg-6 order-2 order-lg-0">
		<div class="section__post-row-category"><?php the_category(); ?></div>
		<div class="section__post-row-title"><h2><?php the_title() ?></h2></div>
		<div class="section__post-row-content"><?php the_content(); ?></div>
		<div class="section__post-row-link">
			<a href="<?php the_permalink(); ?>"
			   class="button btn"><?= __( 'Read more', 'purelab' ) ?></a>
		</div>
	</div>
	<div class=" col-12 col-lg-6  mb-5 mb-lg-0  p-0 p-lg-2 order-1  order-lg-0">
		<img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>"
			 class="w-100 h-auto">
	</div>
</div>
