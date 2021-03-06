<section class="section section__contact">
	<div class="container">

		<!--Section heading-->
		<h2 class="h1-responsive font-weight-bold text-center text-lg-start my-4"><?= __( 'Contact us',
				'purelab' ) ?></h2>
		<!--Section description-->
		<p class="text-center text-lg-start w-responsive mx-auto mb-5"><?= __( 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
			a matter of hours to help you.', 'purelab' ) ?></p>

		<div class="row">

			<!--Grid column-->
			<div class="col-lg-9 mb-md-0 mb-5 order-3 order-lg-0">
				<?= do_shortcode( '[contact-form]' ) ?>
			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-lg-3 contact-info text-center text-lg-start order-2 order-lg-0">
				<ul class="list-unstyled mb-0">
					<li>
						<a href="#"><?= __( 'San Francisco, CA 94126, USA',
								'purelab' ) ?></a>
					</li>

					<li>
						<a href="tel:+0123456789"><?= __( '+ 01 234 567 89',
								'purelab' ) ?></a>
					</li>

					<li>
						<a href="mailto:contact@gmail.com"><?= __( 'contact@gmail.com',
								'purelab' ) ?></a>
					</li>
				</ul>
			</div>
			<!--Grid column-->

		</div>
	</div>
</section>
