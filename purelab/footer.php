<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qit
 */

?>
<?php
get_template_part( 'template-parts/parts/modals/modal', 'quote' );
?>
</main>
<!-- END CONTENT -->
<?php
/**
 * footer_parts hook
 *
 * @hooked qit_footer_TagFooterForm - 10
 * @hooked qit_footer_TagFooterOpen - 20
 * @hooked qit_footer_TagFooterInner - 30
 * @hooked qit_footer_TagFooterClose - 100
 *
 */
do_action( 'footer_parts' );
?>

<?php wp_footer(); ?>

<?php /**
<div class="div-rekki" style="background: black;width: 5px;height: 20px;position: fixed; left:20%" ></div>

 */?>
<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if ( strpos( $url, '/pricing/?thank-you' ) !== false ) {
	?>
	<script type="text/javascript">
		$(window).on('load', function() {
			$('#thank-you').modal('show');
		});
	</script>
	<?php
}?>
</body>
</html>
