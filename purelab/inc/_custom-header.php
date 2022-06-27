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
						'container_class' => 'header__menu p-0 order-3 order-lg-0',
						'fallback_cb'     => false,
						'menu_class' => 'header__menu-list  d-none d-lg-flex menu nav flex-lg-row flex-column pb-4 pb-sm-0 navbar-nav me-auto mb-lg-0 align-items-center',
				);
				wp_nav_menu( $args );

				?>

			<button class="navbar-toggler order-2 order-lg-0 rekki-toggler border-0 d-lg-none d-block col-2" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
				</svg>
			</button>
			<!-- end menu -->
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

