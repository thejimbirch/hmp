<?php
/**
 * The template 'Style 5' to displaying related posts
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.54
 */

$plumbing_link        = get_permalink();
$plumbing_post_format = get_post_format();
$plumbing_post_format = empty( $plumbing_post_format ) ? 'standard' : str_replace( 'post-format-', '', $plumbing_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $plumbing_post_format ) ); ?>>
	<?php
	plumbing_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'plumbing_filter_related_thumb_size', plumbing_get_thumb_size( (int) plumbing_get_theme_option( 'related_posts' ) == 1 ? 'big' : 'med' ) ),
			'show_no_image' => plumbing_get_no_image() != '',
		)
	);
	?>
	<div class="post_header entry-header">
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $plumbing_link ); ?>"><?php the_title(); ?></a></h6>
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			?>
			<div class="post_meta">
				<a href="<?php echo esc_url( $plumbing_link ); ?>" class="post_meta_item post_date"><?php echo wp_kses_data( plumbing_get_date() ); ?></a>
			</div>
			<?php
		}
		?>
	</div>
</div>
