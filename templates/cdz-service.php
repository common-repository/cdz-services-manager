<?php

namespace cdzServicesManager;

/*
 *	cdzTemplate: Single Service
 */

$cdz_service_title		= $post->post_title;
$cdz_service_content	= $post->post_content;

$cdz_service_custom_url		= get_post_meta( $post->ID, 'cdz_service_custom_url', true );

?>

<?php get_header(); ?>

	<div id="primary" class="cdz_service site-content">
		<div id="content" role="main">
			<div id="cdz_service-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-header">
					<?php the_post_thumbnail( 'medium' ); ?>
					<h1 class="entry-title"><?php echo $cdz_service_title; ?></h1>
				</div>

				<div class="entry-content"><p><?php echo do_shortcode( $cdz_service_content ); ?></p></div>

				<div class="entry-meta">
					<?php if ( $cdz_service_custom_url ) : ?>
						<p class="customer">
							<i class="fa fa-globe"></i>
							<span class="label"><?php echo __( 'URL' ) . ': '; ?></span>
							<span class="text"><a href="<?php echo esc_url( $cdz_service_custom_url ); ?>"><?php echo $cdz_service_custom_url; ?></a></span>
						</p>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>