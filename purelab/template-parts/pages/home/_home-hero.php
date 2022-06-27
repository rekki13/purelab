<?php
$arrow = get_template_directory_uri().'/assets/userfilles/icons/Arrow.svg';
?>
<section class="section section__hero">
	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

		<div class="carousel-inner">
			<?php
			// задаем нужные нам критерии выборки данных из БД
			$args = array(
					'posts_per_page' => - 1,
					'orderby'        => 'date',
					'order'          => 'DESC'
			);

			$query = new WP_Query( $args );
			// Цикл
			if ( $query->have_posts() ) :
				$count = 0;

				while ( $query->have_posts() ) :
					$query->the_post();
					get_template_part( 'template-parts/parts/_home', 'slide',
							[ 'info' => $count ] );
					$count ++;
				endwhile;
			else :
				// Постов не найдено
			endif;

			// Возвращаем оригинальные данные поста. Сбрасываем $post.
			wp_reset_postdata();
			?>
		</div>
		<button class="carousel-control-prev" type="button"
				data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<?= file_get_contents($arrow)?>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button"
				data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<?= file_get_contents($arrow)?>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

</section>
