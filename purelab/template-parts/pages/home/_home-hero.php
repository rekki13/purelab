
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

	<div class="carousel-inner">

		<?php
		// задаем нужные нам критерии выборки данных из БД
		$args = array(
			'posts_per_page' => 5,
			'orderby' => 'comment_count'
		);

		$query = new WP_Query( $args );

		// Цикл
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part('template-parts/parts/_hero-slide');

			}
		}
		else {
			// Постов не найдено
		}

		// Возвращаем оригинальные данные поста. Сбрасываем $post.
		wp_reset_postdata();
		?>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>
