<section class="section section__post">
	<div class="container">
			<?php
			// задаем нужные нам критерии выборки данных из БД
			$args = array(
				'post__in' => [9],
				'orderby'        => 'date',
				'order'          => 'DESC'
			);

			$query = new WP_Query( $args );
			// Цикл
			if ( $query->have_posts() ) :
				$count = 0;

				while ( $query->have_posts() ) :
					$query->the_post();
					get_template_part( 'template-parts/parts/_home', 'post',
						[ 'info' => $count ] );
				endwhile;
			else :
				// Постов не найдено
			endif;

			// Возвращаем оригинальные данные поста. Сбрасываем $post.
			wp_reset_postdata();
			?>

	</div>
</section>
