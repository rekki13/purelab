<section class="section section__contact">
	<div class="container">

		<!--Section heading-->
		<h2 class="h1-responsive font-weight-bold text-center my-4"><?=__('Contact us','purelab')?></h2>
		<!--Section description-->
		<p class="text-center w-responsive mx-auto mb-5"><?= __('Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
			a matter of hours to help you.','purelab')?></p>

		<div class="row">

			<!--Grid column-->
			<div class="col-md-9 mb-md-0 mb-5">
			<?= do_shortcode('[contact-form]')?>
			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-md-3 contact-info">
				<ul class="list-unstyled mb-0">
					<li>
						<a href="#"><?=__('San Francisco, CA 94126, USA','purelab')?></a>
					</li>

					<li>
						<a href="tel:+0123456789"><?=__('+ 01 234 567 89','purelab')?></a>
					</li>

					<li>
						<a href="mailto:contact@mdbootstrap.com"><?=__('contact@mdbootstrap.com','purelab')?></a>
					</li>
				</ul>
			</div>
			<!--Grid column-->

		</div>
	</div>
</section>
