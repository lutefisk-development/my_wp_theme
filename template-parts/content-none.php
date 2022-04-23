<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lute
 */

?>

<section class="not-found">
	<h1 class="page-title"><?php _e( 'Inget hittades', 'lute' ); ?></h1>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) :
			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Är du redo att publicera ditt första inlägg? <a href="%1$s">Kom igång här</a>.', 'lute' ),
					[ 'a' => [ 'href' => [], ], ]
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) : ?>
			<p><?php _e( 'Inget matchade dina söktermer. Försök igen med några olika nyckelord.', 'lute' ) ?></p>
			<?php get_search_form();

		else : ?>
			<p><?php _e( 'Det verkar som om vi inte kan hitta det du letar efter. Kanske en sökning kan hjälpa.', 'lute' ) ?></p>
			<?php get_search_form();
		endif; ?>
	</div><!-- /.page-content -->
</section><!-- /.not-found -->
