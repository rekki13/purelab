<?php
/**
 * purelab functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link       https://codex.wordpress.org/Theme_Development
 * @link       https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package    WordPress
 * @subpackage purelab
 * @since      purelab 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since purelab 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}


if ( ! function_exists( 'purelab_setup' ) ) :

	function purelab_setup() {

		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on purelab, use a find and replace
         * to change 'purelab' to the name of your theme in all the template files
         */
		load_theme_textdomain( 'purelab',
				get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
		add_theme_support( 'title-tag' );

		/*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, false );


		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
		) );

		/*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
		add_theme_support( 'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat'
		) );

		add_theme_support( 'custom-header',
				apply_filters( 'purelab_custom_header_args', array(
						'width'  => 954,
						'height' => 1300,
				) ) );


		$gallery_thumbnail = get_gallery_thumbnail_size();
		add_image_size( 'team_thumbnail', 141, 154, true );
		add_image_size( 'gallery_thumbnail', $gallery_thumbnail['width'],
				$gallery_thumbnail['height'], true );
	}
endif; // purelab_setup
add_action( 'after_setup_theme', 'purelab_setup' );

function get_gallery_thumbnail_size() {
	return array(
			'width'  => 871,
			'height' => 565
	);
}


function purelab_init() {

	if ( class_exists( 'MultiPostThumbnails' ) ) {
		new MultiPostThumbnails(
				array(
						'label'     => 'List thumbnail',
						'id'        => 'list-thumbnail',
						'post_type' => 'team'
				)
		);

		$post_id = 0;
		if ( isset( $_GET['post'] ) ) {
			$post_id = absint( $_GET['post'] );
		}

	}
}

add_action( 'init', 'purelab_init' );


/**
 * Customize
 */


add_action( 'wp_print_styles', 'purelab_deregister_styles', 100 );
function purelab_deregister_styles() {
	wp_deregister_style( 'wp-emoji-release' );
}

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );
define( 'ALLOW_UNFILTERED_UPLOADS', true );


/**
 * Menu Links
 */
function _namespace_menu_item_class( $classes, $item ) {
	$classes[] = "nav-item ";

	return $classes;
}

add_filter( 'nav_menu_css_class', '_namespace_menu_item_class', 10, 2 );
function _namespace_modify_menuclass( $ulclass ) {
	return preg_replace( '/<a /', '<a class="nav-link"', $ulclass );
}

add_filter( 'wp_nav_menu', '_namespace_modify_menuclass' );

function submenu_class( $menu ) {

	$menu = preg_replace( '/ class="sub-menu"/',
			'/ class="sub-menu dropdown-menu border-0 " /', $menu );

	return $menu;

}

add_filter( 'wp_nav_menu', 'submenu_class' );

add_filter( 'wp_nav_menu_items', 'add_button_last_item_menu', 10, 2 );
function add_button_last_item_menu( $items, $args ) {
	$search_icon = get_template_directory_uri()
				   . '/assets/userfilles/icons/search.svg';
	if ( $args->theme_location == 'main_menu'
	) {
		$items .= '<li class="menu-item nav-item d-none d-lg-block"><form class="w-auto" role="search">'
				  . file_get_contents( $search_icon ) . '
          <input type="search" class="form-control form-control-dark d-none text-white bg-dark" placeholder="Search..." aria-label="Search">
        </form> </li>';
		$items .= '<li class="menu-item nav-item "><button class="btn mx-auto button black"
                        type="button" >'
				  . __( 'Contact us', 'purelab' ) . '</button></li>';
	}

	return $items;
}


add_action( 'admin_menu', 'register_media_selector_settings_page' );

function register_media_selector_settings_page() {
	add_menu_page(
			'Theme options', // page <title>Title</title>
			'Theme options', // menu link text
			'manage_options', // capability to access the page
			'media-selector', // page URL slug
			'media_selector_settings_page_callback',
			// callback function /w content
			'dashicons-star-half', // menu icon
			5 // priority
	);

}

function media_selector_settings_page_callback() {

	// Save attachment ID
	if ( isset( $_POST['submit_image_selector'] )
		 && isset( $_POST['logo_attachment_id'] )
		 && isset( $_POST['banner_attachment_id'] )
	) :
		update_option( 'media_selector_attachment_id',
				absint( $_POST['logo_attachment_id'] ) );
	update_option( 'banner_media_selector_attachment_id',
				absint( $_POST['banner_attachment_id'] ) );
	endif;

	wp_enqueue_media();

	?>
	<form method='post'>
	<div class='logo-preview-title'>
		<label for="logo-preview"><?= __( 'Logo', 'purelab' ) ?></label>
	</div>
	<div class='logo-preview-wrapper'>
		<img id='logo-preview'
			 src='<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>'
			 height='100'>
	</div>
	<input id="upload_logo_button" type="button" class="button"
		   value="<?php _e( 'Upload image' ); ?>"/>
	<input type='hidden' name='logo_attachment_id' id='logo_attachment_id'
		   value='<?php echo get_option( 'media_selector_attachment_id' ); ?>'>
	<div class='banner-preview-title'>
		<label for="logo-preview"><?= __( 'banner', 'purelab' ) ?></label>
	</div>
	<div class='logo-preview-wrapper'>
		<img id='banner-preview'
			 src='<?php echo wp_get_attachment_url( get_option( 'banner_media_selector_attachment_id' ) ); ?>'
			 height='100'>
	</div>
	<input id="upload_banner_button" type="button" class="button"
		   value="<?php _e( 'Upload image' ); ?>"/>
	<input type='hidden' name='banner_attachment_id' id='banner_attachment_id'
		   value='<?php echo get_option( 'banner_media_selector_attachment_id' ); ?>'>
	<input type="submit" name="submit_image_selector" value="Save"
		   class="button-primary">
	</form><?php

}


add_action( 'admin_footer', 'media_selector_print_scripts' );

function media_selector_print_scripts() {

	$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id',
			0 );

	?>
	<script type='text/javascript'>

		jQuery(document).ready(function ($) {

			// Uploading files
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this

			jQuery('#upload_logo_button').on('click', function (event) {

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if (file_frame) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param('post_id', set_to_post_id);
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}

				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select a image to upload',
					button: {
						text: 'Use this image',
					},
					multiple: false	// Set to true to allow multiple files to be selected
				});

				// When an image is selected, run a callback.
				file_frame.on('select', function () {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();

					// Do something with attachment.id and/or attachment.url here
					$('#logo-preview').attr('src', attachment.url).css('width', 'auto');
					$('#logo_attachment_id').val(attachment.id);

					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});

				// Finally, open the modal
				file_frame.open();
			});

			// Restore the main ID when the add media button is pressed
			jQuery('a.add_media').on('click', function () {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
		});

	</script>
	<script type='text/javascript'>

		jQuery(document).ready(function ($) {

			// Uploading files
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this

			jQuery('#upload_banner_button').on('click', function (event) {

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if (file_frame) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param('post_id', set_to_post_id);
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}

				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select a image to upload',
					button: {
						text: 'Use this image',
					},
					multiple: false	// Set to true to allow multiple files to be selected
				});

				// When an image is selected, run a callback.
				file_frame.on('select', function () {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();

					// Do something with attachment.id and/or attachment.url here
					$('#banner-preview').attr('src', attachment.url).css('width', 'auto');
					$('#banner_attachment_id').val(attachment.id);

					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});

				// Finally, open the modal
				file_frame.open();
			});

			// Restore the main ID when the add media button is pressed
			jQuery('a.add_media').on('click', function () {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
		});

	</script>
	<?php

}

/**
 * This function displays the validation messages, the success message, the container of the validation messages, and the
 * contact form.
 */
function display_contact_form() {

	$validation_messages = [];
	$success_message = '';

	if ( isset( $_POST['contact_form'] ) ) {

		//Sanitize the data
		$full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
		$email     = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
		$message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

		//Validate the data
		if ( strlen( $full_name ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid name.', 'purelab' );
		}

		if ( strlen( $email ) === 0 or
			 ! is_email( $email ) ) {
			$validation_messages[] = esc_html__( 'Please enter a valid email address.', 'purelab' );
		}

		if ( strlen( $message ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid message.', 'purelab' );
		}

		//Send an email to the WordPress administrator if there are no validation errors
		if ( empty( $validation_messages ) ) {

			$mail    = get_option( 'admin_email' );
			$subject = 'New message from ' . $full_name;
			$message = $message . ' - The email address of the customer is: ' . $mail;

			wp_mail( $mail, $subject, $message );

			$success_message = esc_html__( 'Your message has been successfully sent.', 'purelab' );

		}

	}

	//Display the validation errors
	if ( ! empty( $validation_messages ) ) {
		foreach ( $validation_messages as $validation_message ) {
			echo '<div class="validation-message">' . esc_html( $validation_message ) . '</div>';
		}
	}

	//Display the success message
	if ( strlen( $success_message ) > 0 ) {
		echo '<div class="success-message">' . esc_html( $success_message ) . '</div>';
	}

	?>

	<!-- Echo a container used that will be used for the JavaScript validation -->
	<div id="validation-messages-container"></div>

	<form id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>"
		  method="post" class="contact-form">

		<input type="hidden" name="contact_form">

		<div class="form-section ">
			<label for="full-name" class="form-label"><?php echo esc_html( 'Full Name', 'purelab' ); ?></label>
			<input type="text" id="full-name" name="full_name" class="form-control" placeholder="Your full name">
		</div>

		<div class="form-section ">
			<label for="email" class="form-label"><?php echo esc_html( 'Email', 'purelab' ); ?></label>
			<input type="text" id="email" name="email" class="form-control" placeholder="youremail@gmail.com">
		</div>

		<div class="form-section ">
			<label for="message" class="form-label"><?php echo esc_html( 'Message', 'purelab' ); ?></label>
			<textarea id="message" name="message" class="form-control" rows="3"  placeholder="Your message"></textarea>
		</div>

		<input type="submit" id="contact-form-submit" class="button btn d-block mx-auto mx-lg-0" value="<?php echo esc_attr( 'Submit', 'purelab' ); ?>">

	</form>

	<?php

}
add_shortcode( 'contact-form', 'display_contact_form' );
