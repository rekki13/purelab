<?php
defined( 'ABSPATH' ) || exit;
/**
 * @purelab_header_TagHeaderOpen
 */
add_action( 'header_parts', 'purelab_header_TagHeaderOpen', 10 );
function purelab_header_TagHeaderOpen() {
	$classes = get_body_class();

	?>
    <!-- HEADER -->
    <header class="header">
	<?php
}

/**
 * @purelab_header_TagHeaderInner
 */
add_action( 'header_parts', 'purelab_header_TagHeaderInner', 20 );
function purelab_header_TagHeaderInner() {
	?>

    <!-- container -->
    <div class="container">
		<div class="header-row row  flex-wrap justify-content-between ">
			<a href="/" class="header__logo d-flex align-items-center w-auto  text-decoration-none">
				<img class="bi me-2" src="<?= wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) )?>" alt="Logo">
				<span class="fs-4"><b><?=__('Nature','purelab')?></b> &nbsp;<?=__('Agency','purelab')?></span>
			</a>

				<!-- menu -->
				<?php
				/*
				 * Args Nav Menu
				 */

				$args = array(
						'menu'            => 'header',
					// match name to yours
						'theme_location'  => 'main_menu',
						'container'       => 'div',
						'container_class' => 'header__menu w-auto',
						'fallback_cb'     => false,
						'menu_class' => 'header__menu-list d-sm-flex menu nav flex-row pb-4 pb-sm-0 navbar-nav me-auto mb-lg-0 align-items-center',
				);
				wp_nav_menu( $args );

				?>
		</div>


    </div>
    <!-- end container -->

	<?php
}

/**
 * @purelab_header_TagHeaderClose
 */
add_action( 'header_parts', 'purelab_header_TagHeaderClose', 30 );
function purelab_header_TagHeaderClose() {
	?>
    </header>
    <!-- END HEADER -->
	<?php
}

