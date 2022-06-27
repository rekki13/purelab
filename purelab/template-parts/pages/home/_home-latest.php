<section class="section section__latest">
	<div class="container">
		<div class="section__latest-row row">
			<h2 class="section__latest-row-title">
				<?= __( 'Latest from the blog' ) ?>
			</h2>
			<p class="section__latest-row-text"><?=__('Lorem ipsum dolor sit amet,
				consetetur sadipscing elitr, sed diam nonumy eirmod tempor
				invidunt ut labore et dolore magna aliquyam erat, sed diam
				voluptua. At vero eos et accusam et justo duo dolores et ea
				rebum.','purelab')?></p>

		</div>
		<div class="section__latest-row row">
			<?php
			// задаем нужные нам критерии выборки данных из БД
			$args = array(
					'orderby' => 'date',
					'posts_per_page' => 3,
					'order'          => 'DESC'
			);

			$query = new WP_Query( $args );
			// Цикл
			if ( $query->have_posts() ) :
				$count = 0;

				while ( $query->have_posts() ) :
					$query->the_post();
					get_template_part( 'template-parts/parts/_home', 'latest',
							[ 'info' => $count ] );
				endwhile;
			else :
				// Постов не найдено
			endif;

			// Возвращаем оригинальные данные поста. Сбрасываем $post.
			wp_reset_postdata();
			?>
		</div>

	</div>
</section>
