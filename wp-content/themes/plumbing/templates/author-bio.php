<?php
/**
 * The template to display the Author bio
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */
?>

<div class="author_info author vcard" itemprop="author" itemscope itemtype="//schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<?php
		$plumbing_mult = plumbing_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 120 * $plumbing_mult );
		?>
	</div><!-- .author_avatar -->

	<div class="author_description">
		<h4 class="author_title" itemprop="name">
		<?php
			// Translators: Add the author's name in the <span>
			echo wp_kses_data( sprintf( __( 'About %s', 'plumbing' ), '<span class="fn">' . get_the_author() . '</span>' ) );
		?>
		</h4>

		<div class="author_bio" itemprop="description">
			<?php echo wp_kses( wpautop( get_the_author_meta( 'description' ) ), 'plumbing_kses_content'  ); ?>
			<a class="author_link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
													<?php
													// Translators: Add the author's name in the <span>
													printf( esc_html__( 'Read More', 'plumbing' ) );
													?>
			</a>
			<?php do_action( 'plumbing_action_user_meta' ); ?>
		</div><!-- .author_bio -->

	</div><!-- .author_description -->

</div><!-- .author_info -->
