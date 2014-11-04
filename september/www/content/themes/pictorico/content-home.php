<?php
/**
 * @package Pictorico
 */

$format = get_post_format();
$formats = get_theme_support( 'post-formats' );
$postclass = '';

if ( ! has_post_thumbnail() )
	$postclass = 'no-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $postclass ); ?>>
	<div class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'pictorico-home' ); ?>
			<?php endif; ?>
		</a>
	</div>
	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php pictorico_date(); ?>
		</div><!-- .entry-meta -->
		<?php if ( $format && in_array( $format, $formats[0] ) ): ?>
			<a class="entry-format" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'pictorico' ), get_post_format_string( $format ) ) ); ?>"><span class="screen-reader-text"><?php echo get_post_format_string( $format ); ?></span></a>
		<?php endif; ?>
		<?php endif; ?>
		<?php if ( 'link' == $format ) : ?>
			<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( pictorico_get_link_url() ) . '" rel="bookmark">', '</a></h1>' ); ?>
		<?php else : ?>
			<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'pictorico' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
