<?php
defined( 'ABSPATH' ) || exit;


/**
 * @purelab_footer_TagFooterOpen
 */
add_action( 'footer_parts', 'purelab_footer_TagFooterOpen', 20 );
function purelab_footer_TagFooterOpen() {
	?>
    <!-- FOOTER -->
    <footer class="footer">
    <div class="container ">

	<?php
}

;
/**
 * @purelab_footer_TagFooterInner
 */
add_action( 'footer_parts', 'purelab_footer_TagFooterInner', 30 );
function purelab_footer_TagFooterInner() {
	$facebookURL = '#';
	$linkedInURL = '#';
	$instagramURL = '#';
	/**
	 * Social Icons
	 */
	$facebookIcon = get_stylesheet_directory() . '/assets/userfilles/icons/facebook.svg';
	$linkedInIcon = get_stylesheet_directory() . '/assets/userfilles/icons/linkedin.svg';
	$instagramIcon = get_stylesheet_directory() . '/assets/userfilles/icons/instagram.svg';
	?>
		<div class="row ">
			<div class="col-lg-3 col-12 mb-lg-0 mb-5">
				<a href="/" class="footer__logo d-flex align-items-center w-auto text-decoration-none justify-content-center justify-content-lg-start ">
					<img class="bi me-2" src="<?= wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) )?>" alt="Logo">
					<span class="fs-4"><b><?=__('Nature','purelab')?></b> &nbsp;<?=__('Agency','purelab')?></span>
				</a>
				<p class="text-center text-lg-start">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</p>
				<ul class="list-group list-socials list-group-horizontal justify-content-center justify-content-lg-start">
					<li class="list-group-item bg-transparent border-0"><a href="<?=$facebookURL?>" class="footer__socials footer__socials-facebook"><?=file_get_contents($facebookIcon)?></a></li>
					<li class="list-group-item bg-transparent border-0"><a href="<?=$instagramURL?>" class="footer__socials footer__socials-instagram"><?=file_get_contents($instagramIcon)?></a></li>
					<li class="list-group-item bg-transparent border-0"><a href="<?=$linkedInURL?>" class="footer__socials footer__socials-linkedin"><?=file_get_contents($linkedInIcon)?></a></li>
				</ul>
			</div>

			<div class="col d-none d-lg-block">

			</div>

			<div class="col-lg-2 col-6 col-sm-3 mb-lg-0 mb-5">
				<h5>Lorem ipsum</h5>
				<ul class="nav flex-column">
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
				</ul>
			</div>
			<div class="col-lg-2 col-6 col-sm-3  mb-lg-0 mb-5">
				<h5>Lorem ipsum</h5>
				<ul class="nav flex-column">
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
				</ul>
			</div>

			<div class="col-lg-2 col-6 col-sm-3">
				<h5>Lorem ipsum</h5>
				<ul class="nav flex-column">
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
				</ul>
			</div>

			<div class="col-lg-2 col-6 col-sm-3">
				<h5>Lorem ipsum</h5>
				<ul class="nav flex-column">
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
					<li class="nav-item "><a href="#" class="nav-link p-0 ">Lorem ipsum</a></li>
				</ul>
			</div>
	</div>
	<?php

}

;
/**
 * @purelab_footer_TagFooterClose
 */
add_action( 'footer_parts', 'purelab_footer_TagFooterClose', 100 );
function purelab_footer_TagFooterClose() {
	?>        </div>

    </footer>
    <!-- END FOOTER -->
	<?php
}
