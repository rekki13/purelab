<section class="section section__banner">
	<div class="container-fluid">
		<div class="section__banner-row row">
			<div class="col-6 col-img">
				<img id="banner-preview"
				     src="<?php echo wp_get_attachment_url( get_option( 'banner_media_selector_attachment_id' ) ); ?>"
				     alt="banner" class="w-100 h-100">
			</div>
			<div class="col-6 col-text">
				<div class="section__banner-row-subtitle">
					<p><?=__('On focus','purelab')?></p>
				</div>
				<div class="section__banner-row-title">
					<h3><?=__('Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
						sed.','purelab')?></h3>
				</div>
				<div class="section__banner-row-text">
					<p><?=__('Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
						sed diam nonumy eirmod tempor invidunt ut labore et
						dolore magna aliquyam erat, sed diam voluptua. At vero
						eos et accusam et justo.','purelab')?></p>
				</div>
				<div class="section__banner-row-link">
					<a href="#" class="btn button"><?= __( 'Read more',
							'purelab' ) ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
